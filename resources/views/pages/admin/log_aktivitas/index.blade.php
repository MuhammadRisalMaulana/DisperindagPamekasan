@extends('layouts.admin')

@section('title', 'Log Aktivitas')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 py-6 mx-auto">
            <h2 class="mb-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Log Aktivitas
            </h2>

            {{-- Grid filter dan log --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($logs as $log)
                    <div
                        class="bg-gray-50 p-4 rounded-md shadow-md border border-gray-200 transform transition hover:shadow-lg hover:bg-gray-100">

                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ optional($log->user)->name ?? 'Pengguna tidak ditemukan' }}
                        </h3>

                        <p class="text-gray-500 mt-1">
                            {{ $log->status }}
                        </p>

                        <span class="text-gray-400 mt-2 block text-sm">
                            {{ $log->created_at->format('d F Y, H:i') }}
                        </span>
                    </div>
                @empty
                    <div class="col-span-full bg-gray-50 p-4 rounded-md shadow-md border border-gray-200">
                        <p class="text-gray-500">Belum ada riwayat aktivitas.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $logs->links('pagination::tailwind_next_back') }}
            </div>
        </div>
    </main>
@endsection
