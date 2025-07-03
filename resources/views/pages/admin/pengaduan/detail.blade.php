@extends('layouts.admin')

@section('title')
    MADUKONCER | Detail Pengaduan
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                Detail Pengaduan
            </h2>

            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <div
                        class="text-gray-800 text-sm font-semibold px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">
                        <h2>Nama Pelapor : {{ $item->name }}</h2>
                        <h2 class="mt-4">Alamat : {{ $item->user_alamat }}</h2>
                        <h2 class="mt-4">No Telepon : {{ $item->phone }}</h2>
                        <h2 class="mt-4">Lokasi Kejadian : {{ $item->lokasi_kejadian }}</h2>
                        <h2 class="mt-4">Tanggal :
                            {{ $item->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY - HH:mm:ss') }}</h2>
                        <h2 class="mt-4">Status :
                            @if ($item->status == 'Belum di Proses')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-md dark:text-blue-100 dark:bg-blue-700">
                                    {{ $item->status }}
                                </span>
                            @elseif ($item->status == 'Sedang di Proses')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                    {{ $item->status }}
                                </span>
                            @elseif ($item->status == 'Ditolak')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-white dark:bg-red-600">
                                    {{ $item->status }}
                                </span>
                            @else
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                                    {{ $item->status }}
                                </span>
                            @endif
                        </h2>
                    </div>

                    <div class="px-4 py-3 mb-8 flex text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div class="relative hidden mr-3 md:block dark:text-gray-400">
                            <h1 class="text-center mb-4 font-semibold">Foto</h1>
                            <img class="h-auto w-auto max-h-64 max-w-sm rounded-lg"
                                src="{{ asset('storage/' . $item->image) }}" alt="Foto Pengaduan" loading="lazy" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <!-- Card Keterangan -->
                        <div class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">
                            <h1 class="mb-4 font-semibold text-center">Keterangan</h1>
                            <p class="text-center">{{ $item->description }}</p>
                        </div>

                        <!-- Card Keterangan Tambahan -->
                        <div class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-400">
                            <h1 class="mb-4 font-semibold text-center">Keterangan Tambahan</h1>
                            <p class="text-center">{{ $item->keterangan_tambahan ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="px-4 py-3 mb-8 flex bg-white rounded-lg shadow-md dark:text-gray-400 dark:bg-gray-800">
                        <div class="text-center flex-1">
                            <h1 class="mb-4 font-semibold">Tanggapan</h1>
                            <p>
                                @if (empty($tangap) || empty($tangap->tanggapan))
                                    <em>Belum ada tanggapan</em>
                                @else
                                    {{ $tangap->tanggapan }}
                                @endif
                            </p>

                            {{-- Nama Petugas --}}
                            @if (!empty($tangap) && $tangap->user)
                                <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                                    Ditanggapi oleh:
                                    <span class="font-semibold">{{ $tangap->user->name }}</span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex justify-center my-4">
                    <a href="{{ url('admin/pengaduan/cetak', $item->id) }}"
                        class="px-5 py-3 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Export ke PDF
                    </a>
                </div>
                <div class="flex justify-center my-6">
                    <a href="{{ route('tanggapan.index', $item->id) }}"
                        class="px-5 py-3 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Berikan Tanggapan
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
