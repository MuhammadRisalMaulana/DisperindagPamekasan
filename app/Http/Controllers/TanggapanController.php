<?php

namespace App\Http\Controllers;

use App\Helpers\TelegramHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\LogAktivitas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\TelegramBotHandler;
use RealRashid\SweetAlert\Facades\Alert;


class TanggapanController extends Controller
{
    public function index($id){
        $item = Pengaduan::where('id', $id)->firstOrFail();
        return view('pages.admin.tanggapan.add',[
            'item' => $item
        ]);
    }
    public function store(Request $request)
    {
        DB::table('pengaduans')->where('id', $request->pengaduan_id)->update([
            'status' => $request->status,
        ]);

        $petugas_id = Auth::user()->id;

        $data = $request->all();
        $data['pengaduan_id'] = $request->pengaduan_id;
        $data['petugas_id'] = $petugas_id;

        Tanggapan::create($data);
        LogAktivitas::create([
            'user_id' => $petugas_id,
            'aksi' => "Menanggapi pengaduan (ID: {$request->pengaduan_id})",
            'status' => 'Berhasil ditanggapi'
        ]);


        Alert::success('Berhasil', 'Pengaduan berhasil ditanggapi');
        return redirect('admin/pengaduans');
    }
}