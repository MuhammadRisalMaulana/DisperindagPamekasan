@extends('layouts.admin')

@section('title')
    MADUKONCER | Data Pengaduan
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Data Pengaduan
            </h2>
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

                    <div class="bg-white p-6 rounded-md border border-gray-300 shadow mb-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4 text-center uppercase">Filter Data Pengaduan
                            Masyarakat</h4>

                        <form method="GET" action="{{ route('pengaduans.index') }}">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                {{-- Input Nama Pelapor --}}
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                        Pelapor</label>
                                    <input type="text" id="name" name="name" placeholder="Masukkan nama"
                                        value="{{ request('name') }}"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                </div>

                                {{-- Input Tanggal Pengaduan --}}
                                <div>
                                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                        Pengaduan</label>
                                    <input type="date" id="date" name="date" value="{{ request('date') }}"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                </div>

                                {{-- Dropdown Status --}}
                                <div>
                                    <label for="status"
                                        class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select id="status" name="status"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                                        <option value="">Semua Status</option>
                                        <option value="Belum di Proses"
                                            {{ request('status') == 'Belum di Proses' ? 'selected' : '' }}>
                                            Belum di Proses</option>
                                        <option value="Sedang di Proses"
                                            {{ request('status') == 'Sedang di Proses' ? 'selected' : '' }}>
                                            Sedang di Proses</option>
                                        <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>
                                            Selesai</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="flex justify-end gap-3 mt-6">
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-5 py-2 rounded-md transition">
                                    Cari
                                </button>
                                <a href="{{ route('pengaduans.index') }}"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium px-5 py-2 rounded-md transition">
                                    Reset
                                </a>
                            </div>
                        </form>
                    </div>

                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Bukti Foto</th>
                                <th class="px-4 py-3">Pelapor</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($items as $item)
                                <tr class="text-gray-700 dark:text-gray-400 ">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden mr-3  md:block">
                                                <img class=" h-32 w-35 " src="{{ Storage::url($item->image) }}"
                                                    alt="" loading="lazy" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY - HH:mm:ss') }}
                                    </td>
                                    @if ($item->status == 'Belum di Proses')
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-md dark:text-blue-100 dark:bg-blue-700">
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
                                    @elseif ($item->status == 'Ditolak')
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-white dark:bg-red-600">
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
                                    <td class="px-4 py-3 text-sm flex space-x-2">
                                        <!-- Detail -->
                                        <a href="{{ route('pengaduans.show', $item->id) }}"
                                            class="p-2 text-blue-600 rounded hover:bg-blue-100">
                                            <!-- Eye icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="none" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 4C7 4 4 7 4 12C4 17 7 20 12 20C17 20 20 17 20 12C20 7 17 4 12 4Z"
                                                    stroke="#2563eb" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <circle cx="12" cy="12" r="3" stroke="#2563eb"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('pengaduans.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-600 rounded hover:bg-red-100">
                                                <!-- Trash icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path d="M4 7H20" stroke="#dc2626" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M10 11V17" stroke="#dc2626" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14 11V17" stroke="#dc2626" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5 7V19C5 20.105 5.895 21 7 21H17C18.105 21 19 20.105 19 19V7"
                                                        stroke="#dc2626" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M10 4H14" stroke="#dc2626" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
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
                    <div class="px-4 py-3 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col items-center justify-between space-y-4 md:flex-row">
                            <span class="text-sm text-gray-700 dark:text-gray-300">
                                Menampilkan {{ $items->firstItem() }} - {{ $items->lastItem() }} dari
                                {{ $items->total() }} data
                            </span>

                            <div>
                                {{ $items->links('vendor.pagination.tailwind_next_back') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
