@extends('layouts.admin')

@section('title', 'Riwayat Aksi Admin')

@section('content')
    <!-- Full width, rapi tanpa ruang polos kiri dan kanan -->
    <div class="w-full py-8 bg-gray-50 min-h-screen">
        <!-- Konten dengan padding horizontal agar tidak menempel ujung -->
        <div class="w-full px-6">
            <!-- Judul -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    📊 Riwayat Aksi Admin & Petugas
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Semua aktivitas yang dilakukan oleh Admin dan Petugas tercatat di bawah ini.
                </p>
            </div>

            <!-- Tabel Aktivitas -->
            <div class="bg-white shadow-md rounded-lg border border-gray-200 w-full">
                <table class="w-full table-auto divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold">No</th>
                            <th class="px-6 py-3 text-left font-semibold">Pengguna</th>
                            <th class="px-6 py-3 text-left font-semibold">Status</th>
                            <th class="px-6 py-3 text-left font-semibold">Model</th>
                            <th class="px-6 py-3 text-left font-semibold">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($logs as $log)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 font-medium text-gray-700">
                                    {{ $loop->iteration + ($logs->currentPage() - 1) * $logs->perPage() }}</td>
                                <td class="px-6 py-4 text-gray-800">{{ optional($log->user)->name ?? 'Tidak diketahui' }}
                                </td>
                                <td class="px-6 py-4 text-blue-600 font-semibold">{{ $log->status }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $log->model ?? '-' }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $log->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-gray-500">Belum ada log aktivitas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            <!-- Paginasi -->
            <div class="mt-6">
                {{ $logs->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
