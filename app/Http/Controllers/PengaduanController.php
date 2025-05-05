<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Carbon::setLocale('id');
        
        $query = Pengaduan::query();
    
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
    
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }
    
        $items = $query->orderBy('created_at', 'DESC')->get();
    
        return view('pages.admin.pengaduan.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validasi data input
    $request->validate([
        'name' => 'required|string|max:255',
        'user_alamat' => 'required|string|max:255',
        'user_telepon' => 'required|string|max:20',
        'lokasi_kejadian' => 'required|string|max:255',
        'description' => 'required|string',
        'keterangan_tambahan' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
    ]);

    // Simpan file gambar
    $imagePath = $request->file('image')->store('pengaduan', 'public');
    do {
        $token = strtoupper(Str::random(6));
    } while (Pengaduan::where('token', $token)->exists());

    // Simpan data ke database
    Pengaduan::create([
        'name' => $request->name,
        'user_alamat' => $request->user_alamat,
        'phone' => $request->user_telepon,
        'lokasi_kejadian' => $request->lokasi_kejadian,
        'description' => $request->description,
        'keterangan_tambahan' => $request->keterangan_tambahan,
        'image' => $imagePath,
        'token' => $token,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('pengaduan.sukses', ['token' => $token, 'name' => $request->name]);
}

public function sukses(Request $request)
{
    return view('pages.pengaduan.pengaduan_status', [
        'token' => $request->token,
        'name' => $request->name
    ]);
}

public function status()
{
    return view('pages.pengaduan.pengaduan_status');
}

public function check(Request $request)
{
    $request->validate([
        'token' => 'required|string|size:6',
    ]);

    $pengaduan = Pengaduan::where('token', $request->token)->first();

    if (!$pengaduan) {
        return redirect()->route('pengaduan.status')->with('error', 'Token tidak ditemukan.');
    }

    return view('pages.pengaduan.pengaduan_status', compact('pengaduan'))->with('status', 'Pengaduan ditemukan.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Pengaduan::with([
            'details', 'user'
        ])->findOrFail($id);

        $tangap = Tanggapan::where('pengaduan_id', $id)->first();

        return view('pages.admin.pengaduan.detail', [
            'item' => $item,
            'tangap' => $tangap
        ]);
    }

    public function riwayat()
    {
        // Mendapatkan pengaduan yang terkait dengan user yang sedang login
        $pengaduans = Pengaduan::where('user_id', auth()->id())->get();
        
        // Mengirimkan data pengaduan ke view riwayat
        return view('riwayat-pengaduan', compact('pengaduans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $status->update($data);
        return redirect('admin/pengaduans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();

        Alert::success('Berhasil', 'Pengaduan telah di hapus');
        return redirect('admin/pengaduans');
    }
}
