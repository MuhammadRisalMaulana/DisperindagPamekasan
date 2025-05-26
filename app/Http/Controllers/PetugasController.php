<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\LogAktivitas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use RealRashid\SweetAlert\Facades\Alert;


class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles != 'ADMIN') {
            Alert::warning('Peringatan', 'Maaf Anda tidak punya akses');
            return back();
        }

        $data = DB::table('users')->whereIn('roles', ['PETUGAS', 'ADMIN'])->get();
        $jumlahAdmin = User::where('roles', 'ADMIN')->count();
        $jumlahPetugas = User::where('roles', 'PETUGAS')->count();

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aksi'    => "Melihat daftar petugas",
            'model'   => 'User',
            'model_id'=> null,
            'status'  => 'Merubah Status Pengaduan',
        ]);

        return view('pages.admin.petugas.index', [
            'data' => $data,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahPetugas' => $jumlahPetugas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.petugas.create');
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
            'alamat' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|confirmed|min:8',

        ]);

        $user = $request->all();

        $user = User::create([
            'alamat' => $request->alamat,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'roles' => $request->roles,
            'password' => Hash::make($request->password),

        ]);

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aksi'    => "Menambahkan petugas baru dengan ID: {$user->id}",
            'model'   => 'User',
            'model_id'=> $user->id,
        ]);

        Alert::success('Berhasil', 'Petugas baru ditambahkan');
        return redirect('admin/petugas');
    }
    public function riwayat()
    {
        // Ambil semua data pengaduan tanpa filter user
        $pengaduan = Pengaduan::all();

         // Log aktivitas lihat riwayat pengaduan
        LogAktivitas::create([
            'user_id' => auth()->id(),
            'status'    => "Melihat riwayat pengaduan",
            'model'   => 'Pengaduan',
            'model_id'=> null,
        ]);

        // Kirim ke view
        return view('riwayat_pengaduan', compact('pengaduan'));
    }
    
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            Alert::error('Error', 'Petugas tidak ditemukan');
            return back();
        }

        if (
            ($user->roles === 'ADMIN' && User::where('roles', 'ADMIN')->count() <= 1) ||
            ($user->roles === 'PETUGAS' && User::where('roles', 'PETUGAS')->count() <= 1)
        ) {
            Alert::warning('Peringatan', 'Harus ada minimal 1 admin atau petugas.');
            return back();
        }

        $user->delete();

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aksi'    => "Menghapus petugas dengan ID: {$id}",
            'model'   => 'User',
            'model_id'=> $id,
        ]);

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('petugas.index');
    }
}
