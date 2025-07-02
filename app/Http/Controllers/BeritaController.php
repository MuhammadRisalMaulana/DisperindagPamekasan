<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\LogAktivitas;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class BeritaController extends Controller
{

    public function index(Request $request)
    {
        // Optional: filter judul jika ada request query 'judul'
        $query = Berita::query();

        if ($request->has('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }

        $beritas = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('pages.admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('pages.admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'gambar' => 'required|image|max:2048', // max 2MB
        ]);

        $path = $request->file('gambar')->store('berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'gambar' => $path,
        ]);

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aksi' => 'Menambahkan berita',
            'status' => 'Judul: ' . $request->judul,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show($id)
    {
        $berita = Berita::where('id', $id)->first();
        return view('pages.admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('pages.admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diupdate');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file gambar jika ada
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aksi' => 'Menghapus berita',
            'status' => 'Judul: ' . $berita->judul,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }

    public function berita($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.berita', compact('berita'));
    }
    public function allberita()
    {
        $berita = Berita::all();
        return view('berita.allberita', compact('berita'));
    }
}
