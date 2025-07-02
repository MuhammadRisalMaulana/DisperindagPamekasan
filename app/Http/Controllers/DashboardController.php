<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        // Hitung status pengaduan
        $pending = Pengaduan::where('status', 'Belum di Proses')->count();
        $process = Pengaduan::where('status', 'Sedang di Proses')->count();
        $success = Pengaduan::where('status', 'Selesai')->count();

        // Data pengaduan terbaru
        $pengaduan_terbaru = Pengaduan::latest()->take(5)->get();

        // Grafik jumlah pengaduan per bulan
        $chartData = Pengaduan::select(
            DB::raw("COUNT(id) as jumlah"),
            DB::raw("MONTHNAME(created_at) as bulan")
        )
            ->groupBy(DB::raw("MONTH(created_at)"), DB::raw("MONTHNAME(created_at)"))
            ->orderBy(DB::raw("MONTH(created_at)"))
            ->pluck('jumlah', 'bulan');

        $bulanChart = $chartData->keys();
        $jumlahChart = $chartData->values();

        // Kirim ke view
        return view('pages.admin.dashboard', [
            'pengaduan' => $totalPengaduan,
            'user' => $totalUser,
            'berita' => $totalBerita,
            'petugas' => $totalPetugas,
            'admin' => $totalAdmin,
            'tanggapan' => $totalTanggapan,
            'pending' => $pending,
            'process' => $process,
            'success' => $success,
            'pengaduan_terbaru' => Pengaduan::latest()->take(5)->get(),
            'bulanChart' => $bulanChart,
            'jumlahChart' => $jumlahChart,
        ]);
    }
}
