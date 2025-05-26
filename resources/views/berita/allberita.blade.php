<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MADUKONCER DISPERINDAG PAMEKASAN</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logoicon.png') }}">
</head>

<body class="bg-white text-gray-800 font-sans">

    <!-- Navbar -->
    <nav class="bg-green-600 text-white shadow-md fixed top-0 w-full z-50">
        <div class="container mx-auto flex items-center justify-between p-4 px-6">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('img/logodisperindag.png') }}" class="w-10 h-10 transform hover:scale-110 transition"
                    alt="Logo" />
                <span class="font-bold text-xl">MADUKONCER</span>
            </div>
            <ul class="flex space-x-4 hidden md:flex">
                <li><a href="/" class="hover:text-blue-200 font-semibold">Home</a></li>
                <li><a href="/" class="hover:text-blue-200 font-semibold">Tata Cara</a></li>
                <li><a href="/berita" class="hover:text-blue-200 font-semibold">Berita</a></li>
                <li><a href="#lokasi" class="hover:text-blue-200 font-semibold">Lokasi</a></li>
                <li><a href="/pengaduan/status" class="hover:text-blue-200 font-semibold">Cek Pengaduan</a></li>
            </ul>
        </div>
    </nav>

    <!-- Detail Berita -->
    <section class="pt-28 pb-20 px-6 bg-gray-50 min-h-screen">
        @foreach ($berita as $allberita)
            <div class="grid gap-8 md:grid-cols-3">
                <div
                    class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition duration-300">
                    @if ($allberita->gambar)
                        <img src="{{ asset('storage/' . $allberita->gambar) }}" alt="{{ $allberita->judul }}"
                            class="w-full h-48 object-cover" />
                    @else
                        <img src="{{ asset('img/default-berita.jpg') }}" alt="Default berita"
                            class="w-full h-48 object-cover" />
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $allberita->judul }}</h3>
                        <p class="text-sm text-gray-500 mb-4">Diterbitkan pada
                            {{ $allberita->created_at->format('d M Y') }}</p>
                        <p class="text-gray-700 mb-4">
                            {{ \Illuminate\Support\Str::limit(strip_tags($allberita->keterangan), 100, '...') }}</p>
                        <a href="{{ route('berita.detail', $allberita->id) }}"
                            class="block px-4 py-2 text-green-600 hover:underline font-semibold">
                            Baca Selengkapnya
                        </a>

                    </div>
                </div>
            </div>
            
        @endforeach
    </section>

    <!-- Footer -->
    <footer class="bg-green-600 text-white py-4 text-center">
        © {{ now()->year }} MADUKONCER DISPERINDAG PAMEKASAN | By
        <a href="/" class="underline hover:text-green-200" target="_blank">POLINEMA PSDKU PAMEKASAN</a>
    </footer>

    @include('sweetalert::alert')

</body>

</html>
