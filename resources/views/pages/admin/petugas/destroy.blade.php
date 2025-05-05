@extends('layouts.admin')

@section('title')
Hapus Petugas
@endsection

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Konfirmasi Penghapusan Petugas
    </h2>

    {{-- Card Konfirmasi --}}
    <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">
        Apakah Anda yakin ingin menghapus data berikut?
      </h3>
      <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        Nama Petugas : <span class="font-medium">{{ $petugas->name }}</span>
      </p>
      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
        Email : <span class="font-medium">{{ $petugas->email }}</span>
      </p>
      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
        Role : <span class="font-medium">{{ $petugas->roles }}</span>
      </p>
      
      <div class="mt-6 flex items-center justify-end space-x-4">
        <a href="{{ route('petugas.index') }}"
          class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
          Batal
        </a>
        <form action="{{ route('petugas.destroy', $petugas->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
            Hapus
          </button>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection
