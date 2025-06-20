<?php

namespace App\Http\Controllers;

use App\Helpers\TelegramHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\TelegramBotHandler;
use RealRashid\SweetAlert\Facades\Alert;


class TanggapanController extends Controller
{
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


        Alert::success('Berhasil', 'Pengaduan berhasil ditanggapi');
        return redirect('admin/pengaduans');
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
            'details',
            'user'
        ])->findOrFail($id);

        return view('pages.admin.tanggapan.add', [
            'item' => $item
        ]);
    }
}