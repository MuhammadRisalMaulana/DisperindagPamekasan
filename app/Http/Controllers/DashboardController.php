<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalPengaduan = Pengaduan::count();
        $totalUser = User::where('roles', 'USER')->count();
        $totalBerita = Berita::count();
        $totalPetugas = User::where('roles', 'PETUGAS')->count();
        $totalAdmin = User::where('roles', 'ADMIN')->count();
        $totalTanggapan = Tanggapan::count();

        // Hitung status pengaduan untuk grafik
        $pending = Pengaduan::where('status', 'Belum di Proses')->count();
        $process = Pengaduan::where('status', 'Sedang di Proses')->count();
        $success = Pengaduan::where('status', 'Selesai')->count();

        // Kirim data ke view
        return view('pages.admin.dashboard', [
            'pengaduan' => $totalPengaduan,
            'user' => $totalUser,
            'berita'=> $totalBerita,
            'petugas' => $totalPetugas,
            'admin' => $totalAdmin,
            'tanggapan' => $totalTanggapan,
            'pending' => $pending,
            'process' => $process,
            'success' => $success,
        ]);
    }
}
