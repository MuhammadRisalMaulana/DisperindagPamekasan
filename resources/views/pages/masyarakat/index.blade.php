@extends('layouts.masyarakat')

@section('title', 'MADUKONCER | Form Pengaduan')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                Silakan Ajukan Pengaduan Anda
            </h2>

            @if ($errors->any()) 
                <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
                    <ul class="list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-4 py-3 mb-8 bg-gray-50 rounded shadow-md">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Nama Pelapor</span>
                        <input 
                            type="text" 
                            name="name" 
                            placeholder="Masukkan nama lengkap Anda" 
                            class="block w-full mt-1 p-2 border rounded-md" 
                            required>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Alamat Pelapor</span>
                        <input 
                            type="text" 
                            name="user_alamat" 
                            placeholder="Masukkan alamat lengkap Anda" 
                            class="block w-full mt-1 p-2 border rounded-md" 
                            required>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Nomor Telepon (Whatsapp)</span>
                        <input 
                            type="text" 
                            name="phone" 
                            id="phone" 
                            placeholder="Contoh: 081234567890" 
                            class="block w-full mt-1 p-2 border rounded-md" 
                            pattern="[0-9]+" 
                            required>
                        <small>Silakan masukkan nomor yang aktif WhatsApp</small>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Lokasi Kejadian</span>
                        <input 
                            type="text" 
                            name="lokasi_kejadian" 
                            value="{{ old('lokasi_kejadian') }}"
                            placeholder="Masukkan lokasi kejadian"
                            class="block w-full mt-1 p-2 border rounded-md" 
                            required>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Jenis Pengaduan</span>
                        <select 
                            name="description" 
                            required 
                            class="block w-full mt-1 p-2 border rounded-md">
                            <option value="">Pilih Jenis Pengaduan</option>
                            <option value="Barang Kadaluarsa">Barang Kadaluarsa</option>
                            <option value="Barang Tidak Ber SNI">Barang Tidak Ber SNI</option>
                            <option value="Barang Tidak Sesuai Takaran">Barang Tidak Sesuai Takaran</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Keterangan Tambahan</span>
                        <textarea 
                            name="keterangan_tambahan" 
                            placeholder="Masukkan keterangan tambahan jika ada atau jika tidak ada diberi ( - )" 
                            class="block w-full mt-1 p-2 border rounded-md">
                                {{ old('keterangan_tambahan') }}
                        </textarea>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Bukti Foto</span>
                        <input 
                            type="file" 
                            name="image" 
                            accept="image/*" 
                            required 
                            class="block w-full mt-1 p-2 border rounded-md">
                        <small>Unggah foto terkait pengaduan (jpg, png, max 2MB)</small>
                    </label>

                    <button 
                        type="submit" 
                        class="mt-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
                        Laporkan Pengaduan
                    </button>

                </div>
            </form>
        </div>
    </main>
@endsection
