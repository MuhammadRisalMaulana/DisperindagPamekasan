<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use PDF;


class AdminController extends Controller
{
    public function __invoke()
    {
    }

    public function index($id)
    {

        $item = Pengaduan::with([
            'details', 'user'
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
    
        $pengaduan = $query->orderBy('created_at', 'DESC')->get();

        return view('pages.admin.laporan', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function cetak()
    {

        $pengaduan = Pengaduan::orderBy('created_at', 'DESC')->get();

        $pdf = PDF::loadview('pages.admin.pengaduan', [
            'pengaduan' => $pengaduan
        ]);
        return $pdf->download('laporan.pdf');
    }

    public function pdf($id)
    {

        $pengaduan = Pengaduan::find($id);

        $pdf = PDF::loadview('pages.admin.pengaduan.cetak', compact('pengaduan'))->setPaper('a4');
        return $pdf->download('laporan-pengaduan.pdf');
    }
}
