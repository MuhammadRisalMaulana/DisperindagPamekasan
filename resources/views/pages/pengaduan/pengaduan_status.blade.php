@extends('layouts.masyarakat')

@section('title', 'Cek Status Pengaduan')

@section('content')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
      Cek Status Pengaduan Anda
    </h2>

    @if(session('status'))
      <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
        {{ session('status') }}
      </div>
    @endif

    @if(session('error'))
      <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
        {{ session('error') }}
      </div>
    @endif

    <form action="{{ route('pengaduan.check') }}" method="GET">
      @csrf
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
          <span class="text-gray-700">Masukkan Token Pengaduan</span>
          <input type="text" name="token" value="{{ old('token') }}" class="block w-full mt-1 text-sm form-input" placeholder="Contoh: ABC123" required>
        </label>

        <button type="submit"
          class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
          Lihat Pengaduan
        </button>
      </div>
    </form>

    @if(isset($pengaduan))
    <div class="px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h3 class="text-lg font-semibold mb-4">Detail Pengaduan</h3>
      <p><strong>Nama Pelapor:</strong> {{ $pengaduan->name }}</p>
      <p><strong>Alamat:</strong> {{ $pengaduan->user_alamat }}</p>
      <p><strong>Nomor Telepon:</strong> {{ $pengaduan->phone }}</p>
      <p><strong>Lokasi Kejadian:</strong> {{ $pengaduan->lokasi_kejadian }}</p>
      <p><strong>Jenis Pengaduan:</strong> {{ $pengaduan->description }}</p>
      <p><strong>Keterangan Tambahan:</strong> {{ $pengaduan->keterangan_tambahan ?? '-' }}</p>
      <p><strong>Token:</strong> {{ $pengaduan->token }}</p>
      <p><strong>Waktu Pengaduan:</strong> {{ $pengaduan->created_at->format('d M Y H:i') }}</p>
      <p><strong>Status:</strong> {{ $pengaduan->status }}</p>
      <p><strong>Bukti Foto:</strong><br>
        <img src="{{ asset('storage/' . $pengaduan->image) }}" alt="Bukti Foto" class="mt-2 w-64 rounded">
      </p>
    </div>
    @endif

  </div>
</main>
@endsection
