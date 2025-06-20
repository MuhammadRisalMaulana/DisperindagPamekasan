<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(6); // menampilkan 6 berita per halaman
        return view('welcome', compact('berita'));
    }

    // Fungsi untuk detail berita
    public function berita($id)
    {
        $item = Berita::where('id',$id)->first();
        return view('berita.detail_berita', compact('item'));
    }
}
