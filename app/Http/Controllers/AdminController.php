<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\LogAktivitas;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function __invoke()
    {
    }

    public function index($id)
    {

        $item = Pengaduan::with([
            'details',
            'user'
        ])->findOrFail($id);

        return view('pages.admin.tanggapan.add', [
            'item' => $item
        ]);

    }

    public function laporan(Request $request)
    {
        Carbon::setLocale('id');

        $query = Pengaduan::query();

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->filled('status')) {
        $query->where('status', $request->status); // tambahkan ini
    }

        $pengaduan = $query->orderBy('created_at', 'DESC')->get();

        return view('pages.admin.laporan', [
            'pengaduan' => $pengaduan
        ]);
    }

       public function cetak(Request $request)
    {
        $query = Pengaduan::query();

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pengaduan = $query->orderBy('created_at', 'DESC')->get();

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'status' => "Mencetak laporan pengaduan PDF",
        ]);

        $pdf = PDF::loadView('pages.admin.pengaduan', [
            'pengaduan' => $pengaduan,
            'request' => $request
        ]);

        return $pdf->download('laporan.pdf');
    }


    public function pdf($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pdf = PDF::loadView('pages.admin.pengaduan.cetak', compact('pengaduan'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-pengaduan.pdf');
    }

    public function logAktivitas()
    {
        // Ambil log aktivitas dengan relasi user, paling baru dulu, paginasi 20 per halaman
        $logs = LogAktivitas::with('user')->latest()->paginate(20);

        // Kirim ke view admin.log_aktivitas.index
        $logs = LogAktivitas::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('pages.admin.log_aktivitas.index', compact('logs'));
    }
}

