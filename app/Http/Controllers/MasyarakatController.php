<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.masyarakat.index');
    }

    public function create()
    {
        return view('pages.masyarakat.index');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'user_alamat' => 'required|string',
        'description' => 'required|string',
        'lokasi_kejadian' => 'required|string',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->all();
    $data['image'] = $request->file('image')->store('assets/laporan', 'public');
    $data['token'] = Str::random(10); // generate token unik

    Pengaduan::create($data);

    Alert::success('Pengaduan anda telah terkirim!', 'Silakan tunggu notifikasi dari Telegram atau WhatsApp Anda untuk mendapatkan token dan melihat pengaduan yang telah Anda laporkan.');
    return redirect()->route('pengaduan.index');
}

    public function lihat()
    {
        $user = Auth::user();
        $items = Pengaduan::with(['tanggapan'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('pages.masyarakat.detail', [
            'items' => $items
        ]);
    }

    public function show($id)
    {
        $item = Pengaduan::with(['user'])->findOrFail($id);
        $tangap = Tanggapan::where('pengaduan_id', $id)->first();

        return view('pages.masyarakat.show', compact('item', 'tangap'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Mencari data masyarakat berdasarkan id
            $masyarakat = User::findOrFail($id);
    
            // Menghapus data masyarakat
            $masyarakat->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                'name' => $masyarakat->name
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.'
            ], 500);
        }
}
}