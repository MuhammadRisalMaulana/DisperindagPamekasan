<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
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
        return view('masyarakat.index');
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
            'phone' => 'required|string|max:20',
            'lokasi_kejadian' => 'required|string|max:255',
            'description' => 'required|string',
            'keterangan_tambahan' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('pengaduan', 'public');

        do {
            $token = strtoupper(Str::random(6));
        } while (Pengaduan::where('token', $token)->exists());

        // Simpan data ke database tanpa user_id
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

        // Kirim ke Telegram
        $pesan = "📩 *Laporan Baru Diterima!*\n"
            . "Nama: {$pengaduan->name}\n"
            . "Lokasi: {$pengaduan->lokasi_kejadian}\n"
            . "Tanggal: " . Carbon::parse($pengaduan->created_at)->translatedFormat('l, d-m-Y H:i') . "\n"
            . "Token: {$pengaduan->token}\n";
        $this->sendTelegram($pesan);

        if (!empty($pengaduan->no_telegram)) {
            $this->sendTelegramMessage($pengaduan->no_telegram, "Pengaduan Anda telah berhasil dilaporkan. Token Anda: {$pengaduan->token}");
        }

        Alert::success('Berhasil', 'Laporan Anda telah kami terima. Silakan periksa pesan di Telegram untuk melihat token yang dapat digunakan untuk memantau status pengaduan Anda.');

        return redirect()->route('pengaduan.sukses', ['token' => $token, 'name' => $request->name]);
    }

    private function sendTelegramMessage($chat_id, $message)
    {
        $bot_token = env('TELEGRAM_BOT_TOKEN');
        $url = "https://api.telegram.org/bot{$bot_token}/sendMessage";

        Http::get($url, [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ]);
    }

    private function sendTelegram($message)
    {
        $bot_token = env('TELEGRAM_BOT_TOKEN');
        $chat_id = env('TELEGRAM_ADMIN_CHAT_ID'); // Simpan CHAT_ID_ADMIN di .env
        $message = urlencode($message);

        file_get_contents("https://api.telegram.org/bot{$bot_token}/sendMessage?chat_id={$chat_id}&text={$message}&parse_mode=Markdown");
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

        $pesan = "📌 *Status Pengaduan Anda*\n"
            . "Token: {$pengaduan->token}\n"
            . "Status: {$pengaduan->status}";

        if (!empty($pengaduan->no_telegram)) {
            $this->sendTelegramMessage($pengaduan->no_telegram, $pesan);
        }

        return back()->with('success', 'Status diperbarui');
    }

    public function show($id)
    {
        $item = Pengaduan::with(['details', 'user'])->findOrFail($id);
        $tangap = Tanggapan::where('pengaduan_id', $id)->first();

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

        Alert::success('Berhasil', 'Pengaduan telah dihapus');
        return redirect()->route('pengaduan.index');
    }
}
