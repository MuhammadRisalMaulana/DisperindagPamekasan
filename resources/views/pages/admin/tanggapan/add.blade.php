@extends('layouts.admin')

@section('title')
    MADUKONCER | Tanggapan
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl text-center font-semibold text-gray-700 dark:text-gray-200">
                Berikan Tanggapan
            </h2>
            @if ($errors->any())
                <div class="mb-4 px-4 py-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="text-sm">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('tanggapan.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="pengaduan_id" value="{{ $item->id }} ">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Tanggapan</span>
                        <select
                            class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            name="tanggapan" required>
                            <option value="" disabled selected>Pilih Tanggapan</option>
                            <option value="Laporan Anda sedang dalam proses pengecekan oleh tim kami.">Laporan Anda Sedang
                                Dalam Proses Pengecekan Oleh Tim Kami.</option>
                            <option
                                value="Masalah
                                Sudah berhasil kami Tindaklanjuti, Terima Kasih Atas Laporan Anda Silakan Hubungi Kami
                                Kembali Jika Ada Keluhan Lebih Lanjut.">
                                Masalah
                                Sudah berhasil kami Tindaklanjuti, Terima Kasih Atas Laporan Anda Silakan Hubungi Kami
                                Kembali Jika Ada Keluhan Lebih Lanjut.</option>
                            <option
                                value="Mohon Maaf Laporan Anda Kami Tolak, Dikarenakan Pengaduan yang Anda Laporkan Tidak Valid Setelah
                                Kami Observasi Secara Langsung.">
                                Mohon Maaf Laporan Anda Kami Tolak, Dikarenakan Pengaduan yang Anda Laporkan Tidak Valid
                                Setelah
                                Kami Observasi Secara Langsung.</option>
                        </select>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Status</span>

                        <select
                            class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                            name="status" required>
                            <option value="Belum di Proses">Belum di Proses</option>
                            <option value="Sedang di Proses">Sedang di Proses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </label>


                    <button type="submit"
                        class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                        Tanggapi
                    </button>

                    <a href="{{ url()->previous() }}"
                        class="mt-4 ml-4 inline-block text-sm text-blue-600 hover:underline dark:text-blue-400">
                        ← Kembali
                    </a>
                </div>
            </form>
        </div>
    </main>
@endsection
