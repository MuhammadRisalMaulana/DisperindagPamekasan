@extends('layouts.admin')

@section('title')
    MADUKONCER | Edit Berita
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Berita
        </h2>

        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm mb-2">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-2">Keterangan</label>
                <textarea name="keterangan" rows="5" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ old('keterangan', $berita->keterangan) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-2">Gambar Saat Ini</label>
                <img src="{{ Storage::url($berita->gambar) }}" class="w-48 rounded mb-2" alt="Gambar Berita">
                <input type="file" name="gambar" accept="image/*"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <button type="submit"
                class="px-5 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                Update
            </button>
        </form>
    </div>
</main>
@endsection
