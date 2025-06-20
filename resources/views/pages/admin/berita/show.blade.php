@extends('layouts.admin')

@section('title')
    MADUKONCER | Detail Berita
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Detail Berita
        </h2>

        <div class="bg-white p-6 rounded-lg shadow dark:bg-gray-800">
            <img src="{{ Storage::url($berita->gambar) }}" class="w-full rounded-md mb-4" alt="Gambar Berita">

            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                {{ $berita->judul }}
            </h3>

            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                Tanggal: {{ $berita->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
            </p>

            <div class="text-gray-700 dark:text-gray-300">
                {!! nl2br(e($berita->keterangan)) !!}
            </div>

            <div class="mt-6">
                <a href="{{ route('berita.index') }}"
                    class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</main>
@endsection
