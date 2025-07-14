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

    <nav id="navbar" class="bg-green-600 text-white shadow-md fixed top-0 w-full z-50 transition-all duration-300">
        <div class="container mx-auto flex items-center justify-between p-4 px-6">
            <!-- Logo + Judul -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('img/logodisperindag.png') }}"
                    class="w-10 h-10 transform hover:scale-110 transition duration-300" alt="Logo" />
                <span class="font-bold text-xl tracking-wide">MADUKONCER</span>
            </div>

            <!-- Toggle (Mobile) -->
            <div class="md:hidden">
                <button id="navToggle" class="focus:outline-none text-white hover:text-gray-300">
                    <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                        <path d="M4 5h16M4 12h16M4 19h16" />
                    </svg>
                </button>
            </div>

            <!-- Menu -->
            <ul id="navMenu"
                class="hidden md:flex md:space-x-6 flex-col md:flex-row absolute md:static top-full left-0 w-full md:w-auto bg-green-600 md:bg-transparent md:space-y-0 space-y-3 px-6 md:px-0 py-4 md:py-0 text-lg font-semibold z-50">
                <li><a href="{{ url('/') }}" class="hover:text-gray-300 transition duration-200">Home</a></li>
                <li><a href="{{ url('/#profil') }}" class="hover:text-gray-300 transition duration-200">Profil</a></li>
                <li><a href="{{ url('/#tentangprogram') }}" class="hover:text-gray-300 transition duration-200">Tentang
                        Program</a></li>
                <li><a href="{{ url('/#tatacara') }}" class="hover:text-gray-300 transition duration-200">Tata Cara</a>
                </li>
                <li><a href="{{ url('/berita') }}" class="hover:text-gray-300 transition duration-200">Berita</a></li>
                <li><a href="{{ url('/#lokasi') }}" class="hover:text-gray-300 transition duration-200">Lokasi</a></li>
                <li><a href="{{ url('/#kontak') }}" class="hover:text-gray-300 transition duration-200">Kontak</a></li>
                <li><a href="{{ url('/pengaduan/status') }}" class="hover:text-gray-300 transition duration-200">Cek
                        Pengaduan</a></li>
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

    <script>
        document.getElementById('navToggle').addEventListener('click', function() {
            const menu = document.getElementById('navMenu');
            menu.classList.toggle('hidden');
        });

        // Scroll style navbar
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 20) {
                nav.classList.add('bg-green-700', 'shadow-lg');
            } else {
                nav.classList.remove('bg-green-700', 'shadow-lg');
            }
        });
    </script>


</body>

</html>
