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
                        <input type="text" name="name" placeholder="Masukkan nama lengkap Anda"
                            class="block w-full mt-1 p-2 border rounded-md" required>
                        <small>Berikan nama lengkap anda</small>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Alamat Pelapor</span>
                        <input type="text" name="user_alamat" placeholder="Masukkan alamat lengkap Anda"
                            class="block w-full mt-1 p-2 border rounded-md" required>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Nomor Telepon (WhatsApp)</span>
                        <input type="text" name="phone" id="phone" placeholder="Contoh: 081234567890"
                            class="block w-full mt-1 p-2 border rounded-md" pattern="^0[0-9]{9,13}$" required>
                        <small>Gunakan format 08xxxxxxxxxx. Sistem akan mengubah menjadi 62 secara otomatis.</small>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Lokasi Kejadian</span>
                        <div class="relative mt-1">
                            <input id="lokasi_kejadian" name="lokasi_kejadian" value="{{ old('lokasi_kejadian') }}" readonly
                                placeholder="Tulisan lokasi pengaduan anda atau langsung gunakan lokasi saya"
                                class="block w-full pr-12 p-2 border rounded-md focus:ring focus:ring-blue-200" required>

                            <button type="button" onclick="getMyLocation()"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-white bg-green-600 rounded-r-md hover:bg-green-700 text-sm">
                                📍
                            </button>
                        </div>
                        <p id="lokasiStatus" class="text-sm mt-2 text-gray-600"></p>
                    </label>

                    {{-- Hidden fields --}}
                    <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
                    <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">

                    {{-- Alamat dari koordinat --}}
                    <div id="alamatContainer" class="mt-2 p-3 bg-gray-100 rounded-md hidden">
                        <p class="text-sm font-semibold text-gray-700">Alamat Lokasi:</p>
                        <p id="alamatLengkap" class="text-sm text-gray-800 mt-1"></p>
                        <a id="mapLink" href="#" target="_blank"
                            class="inline-block mt-2 text-sm text-blue-600 hover:underline">
                            🌍 Lihat di Google Maps
                        </a>
                    </div>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Jenis Pengaduan</span>
                        <select name="description" required class="block w-full mt-1 p-2 border rounded-md">
                            <option value="">Pilih Jenis Pengaduan</option>
                            <option value="Barang Kadaluarsa">Barang Kadaluarsa</option>
                            <option value="Barang Tidak Ber SNI">Barang Tidak Ber SNI</option>
                            <option value="Barang Tidak Sesuai Takaran">Barang Tidak Sesuai Takaran</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Keterangan Tambahan</span>
                        <textarea name="keterangan_tambahan"
                            placeholder="Masukkan keterangan tambahan jika ada atau jika tidak ada diberi ( - )"
                            class="block w-full mt-1 p-2 border rounded-md">{{ old('keterangan_tambahan') }}</textarea>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700">Bukti Foto</span>
                        <input type="file" name="image" accept="image/jpeg,image/png,image/jpg" required
                            class="block w-full mt-1 p-2 border rounded-md"
                            onchange="if(this.files[0].size > 10485760){ alert('Ukuran maksimal 10MB!'); this.value=''; }">
                        <small>Unggah foto terkait pengaduan (jpg, png, maksimal 10MB)</small>
                    </label>

                    <button type="submit"
                        class="mt-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
                        Laporkan Pengaduan
                    </button>

                </div>
            </form>
        </div>
    </main>
    <script>
        function getMyLocation() {
            const status = document.getElementById('lokasiStatus');
            const lokasiInput = document.getElementById('lokasi_kejadian');
            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');
            const alamatContainer = document.getElementById('alamatContainer');
            const alamatLengkap = document.getElementById('alamatLengkap');
            const mapLink = document.getElementById('mapLink');

            if (!navigator.geolocation) {
                status.textContent = 'Geolocation tidak didukung oleh browser Anda.';
                return;
            }

            status.textContent = 'Mengambil lokasi...';
            alamatContainer.classList.add('hidden');

            navigator.geolocation.getCurrentPosition(
                async (position) => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;

                    latitudeInput.value = lat;
                    longitudeInput.value = lon;
                    lokasiInput.value = `${lat}, ${lon}`;
                    status.textContent = 'Koordinat berhasil diambil. Mencari alamat...';

                    try {
                        // Reverse geocoding using Nominatim (OpenStreetMap)
                        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`);
                        const data = await response.json();
                        
                        if (data && data.address) {
                            const address = data.address;
                            let alamat = '';
                            
                            // Build address string from components
                            if (address.road) alamat += address.road + ', ';
                            if (address.village) alamat += address.village + ', ';
                            if (address.subdistrict) alamat += address.subdistrict + ', ';
                            if (address.city_district) alamat += address.city_district + ', ';
                            if (address.city) alamat += address.city;
                            
                            alamatLengkap.textContent = alamat || 'Alamat tidak ditemukan';
                            alamatContainer.classList.remove('hidden');
                            mapLink.href = `https://www.google.com/maps?q=${lat},${lon}`;
                            status.textContent = 'Lokasi berhasil diambil.';
                        } else {
                            alamatLengkap.textContent = 'Alamat tidak ditemukan';
                            alamatContainer.classList.remove('hidden');
                            status.textContent = 'Koordinat ditemukan tetapi alamat tidak dapat ditentukan.';
                        }
                    } catch (error) {
                        console.error('Error fetching address:', error);
                        status.textContent = 'Koordinat ditemukan tetapi gagal mendapatkan alamat.';
                    }
                },
                (error) => {
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            status.textContent = 'Akses lokasi ditolak.';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            status.textContent = 'Informasi lokasi tidak tersedia.';
                            break;
                        case error.TIMEOUT:
                            status.textContent = 'Waktu permintaan lokasi habis.';
                            break;
                        default:
                            status.textContent = 'Terjadi kesalahan saat mengambil lokasi.';
                            break;
                    }
                }, {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 0
                }
            );
        }
    </script>
@endsection