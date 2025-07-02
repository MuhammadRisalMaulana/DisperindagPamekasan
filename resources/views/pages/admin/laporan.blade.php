@extends('layouts.admin')

@section('title')
    MADUKONCER | Laporan
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <div class="my-6 mb-6">
                <a href="{{ route('laporan.cetak', request()->only('name', 'date', 'status')) }}"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    Export ke PDF
                </a>
            </div>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="flex justify-between mb-4">
                        <form method="GET" action="{{ route('laporan.index') }}" class="flex space-x-4">
                            <input type="text" name="name" placeholder="Cari Nama" value="{{ request('name') }}"
                                class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" />

                            <input type="date" name="date" value="{{ request('date') }}"
                                class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" />

                            <select name="status" class="...">
                                <option value="">Semua Status</option>
                                <option value="Belum di Proses"
                                    {{ request('status') == 'Belum di Proses' ? 'selected' : '' }}>Belum di Proses</option>
                                <option value="Sedang di Proses"
                                    {{ request('status') == 'Sedang di Proses' ? 'selected' : '' }}>Sedang di Proses
                                </option>
                                <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>

                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                                Cari
                            </button>
                        </form>
                    </div>
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Alamat</th>
                                <th class="px-4 py-3">Pengaduan</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($pengaduan as $item)
                                <tr class="text-gray-700 dark:text-gray-400 ">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->id }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->user_alamat }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->description }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY - HH:mm:ss') }}
                                    </td>



                                    @if ($item->status == 'Belum di Proses')
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    @elseif ($item->status == 'Sedang di Proses')
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    @else
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-gray-400">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection
