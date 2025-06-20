@extends('layouts.admin')

@section('title')
    MADUKONCER | Data Berita
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Data Berita
            </h2>

            <div class="my-4 mb-6">
                <a href="{{ route('berita.create') }}"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                    Tambah Berita
                </a>
            </div>

            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Gambar</th>
                                <th class="px-4 py-3">Judul</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse ($beritas as $berita)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <img src="{{ Storage::url($berita->gambar) }}" alt="Gambar Berita"
                                            class="h-20 w-32 object-cover rounded-md">
                                    </td>
                                    <td class="px-4 py-3 text-sm font-semibold">
                                        {{ $berita->judul }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $berita->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm flex space-x-2">
                                        <!-- Detail -->
                                        <a href="{{ route('berita.show', $berita->id) }}"
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

                                        <!-- Edit -->
                                        <a href="{{ route('berita.edit', $berita->id) }}"
                                            class="p-2 text-green-600 rounded hover:bg-green-100">
                                            <!-- Pencil icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="none" viewBox="0 0 24 24">
                                                <path d="M17 3C17 3 19 5 21 7C21 7 20 8 19 9L15 5C16 4 17 3 17 3Z"
                                                    stroke="#16a34a" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M15 5L5 15V19H9L19 9" stroke="#16a34a" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
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
                                    <td colspan="4" class="text-center text-gray-400 py-4">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination jika ada --}}
                    <div class="mt-4">
                        {{ $beritas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
