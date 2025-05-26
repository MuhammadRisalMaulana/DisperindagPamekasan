@extends('layouts.admin')

@section('title')
    MADUKONCER | Tambah Berita
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tambah Berita
        </h2>

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-sm mb-2">Judul</label>
                <input type="text" name="judul" required value="{{ old('judul') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-purple-300">
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-2">Keterangan</label>
                <textarea name="keterangan" rows="5" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-purple-300">{{ old('keterangan') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-2">Gambar</label>
                <input type="file" name="gambar" accept="image/*"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-purple-300">
            </div>

            <button type="submit"
                class="px-5 py-2 text-white bg-purple-600 rounded hover:bg-purple-700 transition">
                Simpan
            </button>
        </form>
    </div>
</main>
@endsection
