@extends('layouts.masyarakat')

@section('title', 'MADUKONCER | Dashboard')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
      Silahkan Ajukan Pengaduan Anda!
    </h2>

    @if ($errors->any())
    <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block mt-4 text-sm">
          <span class="text-gray-700">Nama Pelapor</span>
          <input type="text" name="name" class="block w-full mt-1 text-sm form-input" required>
        </label>
        
        <label class="block mt-4 text-sm">
          <span class="text-gray-700">Alamat Pelapor</span>
          <input type="text" name="user_alamat" class="block w-full mt-1 text-sm form-input" required>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700">Nomor Telepon</span>
          <input type="tel" name="user_telepon" value="{{ old('user_telepon') }}"
            class="block w-full mt-1 text-sm form-input" required>
        </label>
        
        <label class="block mt-4 text-sm">
          <span class="text-gray-700">Lokasi Kejadian</span>
          <input type="text" name="lokasi_kejadian" value="{{ old('lokasi_kejadian') }}"
            class="block w-full mt-1 text-sm form-input" required />
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700">Jenis Pengaduan</span>
          <select name="description" required
            class="block w-full mt-1 text-sm form-select">
            <option value="" disabled selected>Pilih Jenis Pengaduan</option>
            <option value="Barang Kadaluarsa">Barang Kadaluarsa</option>
            <option value="Barang Tidak Ber SNI">Barang Tidak Ber SNI</option>
            <option value="Barang Tidak Sesuai Takaran">Barang Tidak Sesuai Takaran</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700">Keterangan Tambahan</span>
          <textarea name="keterangan_tambahan"
            class="block w-full mt-1 text-sm form-textarea">{{ old('keterangan_tambahan') }}</textarea>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700">Bukti Foto</span>
          <input type="file" name="image" required
            class="block w-full mt-1 text-sm form-input" />
        </label>

        <button type="submit"
          class="mt-4 px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
          Laporkan
        </button>
        
      </div>
    </form>
  </div>
</main>
@endsection
