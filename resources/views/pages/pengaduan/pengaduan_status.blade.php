@extends('layouts.masyarakat')

@section('title', 'Cek Status Pengaduan')

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-200">
                Cek Status Pengaduan Anda
            </h2>

            @if (session('status'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Pesan jika token diinput tapi tidak ditemukan --}}


            <form action="{{ route('pengaduan.check') }}" method="GET">
                @csrf
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm">
                        <span class="text-gray-700">Masukkan Token Pengaduan</span>
                        <input type="text" name="token" value="{{ old('token') }}"
                            class="block w-full mt-1 text-sm form-input" placeholder="Contoh: ABC123" required>
                    </label>

                    <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Lihat Pengaduan
                    </button>
                </div>
            </form>
            @if (isset($pengaduan))
                <div class="px-6 py-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h3 class="text-xl font-semibold mb-6 text-center text-blue-700">Detail Pengaduan</h3>

                    @php
                        $status = strtolower($pengaduan->status);

                        $statusColor = match ($status) {
                            'belum di proses' => 'bg-blue-100 text-blue-700 dark:text-blue-100 dark:bg-blue-700',
                            'sedang di proses' => 'bg-orange-100 text-orange-700 dark:text-white dark:bg-orange-600',
                            'ditolak' => 'bg-red-100 text-red-700 dark:text-white dark:bg-red-600',
                            'selesai' => 'bg-green-100 text-green-700 dark:bg-green-700 dark:text-green-100',
                            default => 'bg-gray-100 text-gray-800',
                        };
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-800 dark:text-gray-100">
                        <p><strong>Token:</strong> {{ $pengaduan->token }}</p>
                        <p><strong>Waktu Pengaduan:</strong> {{ $pengaduan->created_at->format('d M Y H:i') }}</p>
                        <p><strong>Diperbarui pada:</strong> {{ $pengaduan->updated_at->format('d M Y H:i') }}</p>
                        <p>
                            <strong>Status:</strong>
                            <span id="status"
                                class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $statusColor }}">
                                {{ $pengaduan->status }}
                            </span>
                        </p>
                        <p><strong>Nama Pelapor:</strong> {{ $pengaduan->name }}</p>
                        <p><strong>Nomor Telepon:</strong> {{ $pengaduan->phone }}</p>
                        <p><strong>Alamat Pelapor:</strong> {{ $pengaduan->user_alamat }}</p>
                        <p><strong>Jenis Pengaduan:</strong> {{ $pengaduan->description }}</p>
                        <p class="md:col-span-2"><strong>Keterangan Tambahan:</strong>
                            {{ $pengaduan->keterangan_tambahan ?? '-' }}</p>
                            <p><strong>Lokasi Koordinat:</strong> {{ $pengaduan->lokasi_kejadian }}</p>
                        
                        {{-- Alamat dari koordinat --}}
                        <div id="alamatContainer" class="md:col-span-2 p-3 bg-gray-100 rounded-md">
                            <p class="text-sm font-semibold text-gray-700">Alamat Lokasi:</p>
                            <p id="alamatLengkap" class="text-sm text-gray-800 mt-1">Memuat alamat...</p>
                            <a id="mapLink" href="#" target="_blank"
                                class="inline-block mt-2 text-sm text-blue-600 hover:underline">
                                🌍 Lihat di Google Maps
                            </a>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <strong class="block mb-2">📷 Bukti Foto:</strong>
                        <img src="{{ asset('storage/' . $pengaduan->image) }}" alt="Bukti Foto"
                            class="inline-block w-full max-w-xs md:max-w-sm rounded-lg shadow-md border hover:scale-105 transition-transform duration-200">

                        {{-- Tombol Download --}}
                        @if ($pengaduan->image)
                            <a href="{{ asset('storage/' . $pengaduan->image) }}" download
                                class="inline-block mt-3 px-4 py-2 bg-gray-200 text-sm text-gray-800 rounded hover:bg-gray-300">
                                Download Bukti Foto
                            </a>
                        @endif
                    </div>
                    @if ($pengaduan->tanggapan)
                        <div class="mt-8 p-6 bg-blue-50 border border-blue-200 text-blue-900 rounded-lg shadow-sm">
                            <h4 class="text-lg font-semibold mb-2">Tanggapan dari Petugas</h4>
                            <div class="space-y-2 text-sm leading-relaxed">
                                {{ $pengaduan->tanggapan->tanggapan }}
                            </div>
                        </div>
                    @else
                        <div class="mt-8 p-4 bg-yellow-50 border border-yellow-200 text-yellow-900 rounded">
                            <strong>Belum ada tanggapan dari petugas.</strong> Silakan cek kembali nanti.
                        </div>
                    @endif
                </div>
            @endif

        </div>
    </main>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (isset($pengaduan))
                // Parse coordinates from lokasi_kejadian
                const lokasiKejadian = "{{ $pengaduan->lokasi_kejadian }}";
                const coords = lokasiKejadian.split(',').map(coord => parseFloat(coord.trim()));
                
                if (coords.length === 2 && !isNaN(coords[0]) && !isNaN(coords[1])) {
                    const lat = coords[0];
                    const lon = coords[1];
                    
                    const alamatLengkap = document.getElementById('alamatLengkap');
                    const mapLink = document.getElementById('mapLink');
                    
                    // Set Google Maps link
                    mapLink.href = `https://www.google.com/maps?q=${lat},${lon}`;
                    
                    // Fetch address using Nominatim (OpenStreetMap)
                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
                        .then(response => response.json())
                        .then(data => {
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
                            } else {
                                alamatLengkap.textContent = 'Alamat tidak ditemukan';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching address:', error);
                            alamatLengkap.textContent = 'Gagal memuat alamat';
                        });
                } else {
                    document.getElementById('alamatLengkap').textContent = 'Format koordinat tidak valid';
                }
            @endif
        });
        setInterval(() => {
            const url = window.location.href;

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    // Ambil elemen status dari response HTML baru
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newStatus = doc.querySelector('#status-pengaduan');

                    if (newStatus) {
                        // Ganti status di halaman saat ini
                        document.querySelector('#status-pengaduan').innerHTML = newStatus.innerHTML;
                        document.querySelector('#status-pengaduan').className = newStatus.className;
                    }
                });
        }, 15000); // tiap 15 detik
    </script>
@endsection
