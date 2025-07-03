<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\LogAktivitas;
use Illuminate\Support\Facades\Http;
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

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // ✅ Gunakan paginate agar mendukung withQueryString() dan links()
        $items = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.admin.pengaduan.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_alamat' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9\-\+]{9,15}$/',
            'lokasi_kejadian' => 'required|string|max:255',
            'description' => 'required|string|min:15',
            'keterangan_tambahan' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $isDuplicate = Pengaduan::where('name', $request->name)
            ->where('lokasi_kejadian', $request->lokasi_kejadian)
            ->where('phone', $request->phone)
            ->where('description', $request->description)
            ->whereDate('created_at', now()->toDateString())
            ->exists();

        if ($isDuplicate) {
            return back()->withErrors(['duplicate' => 'Pengaduan serupa sudah pernah dikirim hari ini.'])->withInput();
        }

        if (!$request->hasFile('image') || !$request->file('image')->isValid()) {
            return back()->withErrors(['image' => 'File gagal diunggah.'])->withInput();
        }

        $imagePath = $request->file('image')->store('pengaduan', 'public');

        do {
            $token = strtoupper(Str::random(6));
        } while (Pengaduan::where('token', $token)->exists());

        $pengaduan = Pengaduan::create([
            'name' => $request->name,
            'user_alamat' => $request->user_alamat,
            'phone' => $request->phone,
            'lokasi_kejadian' => $request->lokasi_kejadian,
            'description' => $request->description,
            'keterangan_tambahan' => $request->keterangan_tambahan,
            'image' => $imagePath,
            'token' => $token,
        ]);

        // Kirim Token via WhatsApp
        $formattedPhone = preg_replace('/^0/', '62', $request->phone);
        $message = "📩 *Pengaduan Diterima!*\n"
            . "Halo *{$request->name}*,\n"
            . "Pengaduan Anda telah kami terima.\n"
            . "Lokasi Pengaduan : {$request->lokasi_kejadian}\n"
            . "Token Anda : *{$token}*";

        $response = $this->sendWhatsApp($formattedPhone, $message);

        if (isset($response['status']) && $response['status'] === 'success') {
            Alert::success('Berhasil', 'Laporan Anda telah kami terima. Silakan cek pesan WhatsApp Anda.');
        } else {
            Alert::error('Gagal', 'Pesan WhatsApp tidak terkirim. Silakan coba lagi.');
            \Log::error('WhatsApp Error:', ['response' => $response]);
        }

        Alert::success('Berhasil', 'Laporan Anda telah kami terima. Silakan cek pesan WhatsApp Anda.');

        return redirect()->route('pengaduan.sukses', ['token' => $token, 'name' => $request->name]);
    }

    public function show($id)
    {
        $item = Pengaduan::with(['details', 'user'])->findOrFail($id);
        $tangap = Tanggapan::with('user')->where('pengaduan_id', $id)->first();


        return view('pages.admin.pengaduan.detail', [
            'item' => $item,
            'tangap' => $tangap
        ]);
    }

    public function riwayat()
    {
        $pengaduans = Pengaduan::orderBy('created_at', 'desc')->get();
        return view('pages.pengaduan.riwayat', compact('pengaduans'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update($request->all());
        return redirect()->route('pengaduan.index');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aksi' => 'Menghapus pengaduan',
            'status' => 'Token: ' . $pengaduan->token . ', Nama: ' . $pengaduan->name,
        ]);


        Alert::success('Berhasil', 'Pengaduan telah dihapus');
        return redirect()->route('pengaduans.index');
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

    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aksi' => 'Memperbarui status pengaduan',
            'status' => 'Token: ' . $pengaduan->token . ', Status baru: ' . $request->status,
        ]);


        return back()->with('success', 'Status diperbarui');
    }
    private function sendWhatsApp($phone, $message)
    {
        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_KEY'),
        ])->asForm()->post('https://api.fonnte.com/send', [
                    'target' => $phone,
                    'message' => $message,
                    'device' => env('FONNTE_DEVICE_ID'),
                ]);


        \Log::info("Target WA: $phone");
        \Log::info("Pesan WA: $message");
        \Log::info("Respons Fonnte: " . $response->body());

        if ($response->failed()) {
            \Log::error('Gagal kirim WA ke ' . $phone . '. Respon: ' . $response->body());
        }

        return $response;
    }

}
