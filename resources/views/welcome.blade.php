<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MADUKONCER | DISPERINDAG PAMEKASAN</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logoicon.png') }}">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-white text-gray-800 font-sans">

    <!-- Navbar -->
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
                <li><a href="/" class="hover:text-gray-300 transition duration-200">Home</a></li>
                <li><a href="#profil" class="hover:text-gray-300 transition duration-200">Profil</a></li>
                <li><a href="#tentangprogram" class="hover:text-gray-300 transition duration-200">Tentang Program</a>
                </li>
                <li><a href="#tatacara" class="hover:text-gray-300 transition duration-200">Tata Cara</a></li>
                <li><a href="/berita" class="hover:text-gray-300 transition duration-200">Berita</a></li>
                <li><a href="#lokasi" class="hover:text-gray-300 transition duration-200">Lokasi</a></li>
                <li><a href="#kontak" class="hover:text-gray-300 transition duration-200">Kontak</a></li>
                <li><a href="/pengaduan/status" class="hover:text-gray-300 transition duration-200">Cek Pengaduan</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Hero -->
    <section class="relative h-screen flex items-center justify-center text-white">
        <img src="{{ asset('img/kantorvektor.png') }}"
            class="absolute inset-0 w-full h-full object-cover brightness-75 blur-sm z-0" alt="Background" />
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        <div class="container z-20 relative flex flex-col md:flex-row items-center px-6 text-center md:text-left">
            <div class="md:w-1/2">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-snug">Layanan Pengawasan Barang / Jasa Beredar
                </h1>
                <p class="text-lg mb-6">MADU KONCER [MASYARAKAT PEDULI KONSUMEN CERDAS]<br />DISPERINDAG KABUPATEN
                    PAMEKASAN</p>
                <a href="{{ url('pengaduan') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded shadow-lg transition">
                    LAPORKAN SEKARANG
                </a>
            </div>
            <div class="w-full md:w-3/5 text-center">
                <img class="object-fill mx-60 transform transition hover:scale-110 duration-300 ease-in-out"
                    src="{{ asset('img/pamekasan.png') }}" />
            </div>
        </div>
    </section>


    <!-- PROFIL INSTANSI -->
    <section id="profil" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-green-700 text-center mb-10">Profil</h2>

            <div class="flex flex-col lg:flex-row gap-10 items-center">
                <!-- Gambar Kantor -->
                <div class="lg:w-1/2">
                    <img src="{{ asset('img/kantor.jpg') }}" alt="Kantor Disperindag Pamekasan"
                        class="rounded-xl shadow-lg w-full max-h-[400px] object-cover">
                </div>

                <!-- Deskripsi -->
                <div class="lg:w-1/2 text-gray-800 leading-relaxed text-lg">
                    <p class="mb-4">
                        <strong>Dinas Perindustrian dan Perdagangan (Disperindag)</strong> Kabupaten Pamekasan adalah
                        instansi pemerintah daerah yang berperan dalam menyelenggarakan urusan pemerintahan bidang
                        perindustrian dan perdagangan, termasuk pengawasan terhadap peredaran barang dan jasa serta
                        perlindungan konsumen.
                    </p>

                    <p class="mb-4">
                        Disperindag memiliki komitmen untuk memberikan pelayanan publik yang cepat, transparan, dan
                        responsif melalui berbagai inovasi digital, salah satunya adalah sistem pengaduan konsumen
                        berbasis website, <strong>MADU KONCER</strong>.
                    </p>

                    <h3 class="text-xl font-semibold text-green-700 mt-6 mb-2">Struktur dan Bidang Layanan:</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Bidang Industri:</strong> Pengembangan industri kecil, menengah, dan aneka.</li>
                        <li><strong>Bidang Perdagangan Dalam Negeri dan Luar Negeri:</strong> Distribusi barang dan
                            stabilitas harga.</li>
                        <li><strong>Bidang Pengawasan dan Perlindungan Konsumen:</strong> Menangani pengawasan
                            barang/jasa, pengujian mutu, dan penanganan pengaduan.</li>
                        <li><strong>Bidang Pengelolaan Pasar:</strong> Fasilitasi dan pembinaan pasar rakyat serta pasar
                            modern.</li>
                    </ul>

                    <div class="mt-6">
                        <a href="https://disperindag.pamekasankab.go.id" target="_blank"
                            class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium px-3 py-2 rounded-lg shadow transition">
                            🌐 Kunjungi Website Resmi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROGRAM MADU KONCER -->
    <section id="tentangprogram" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-green-700 mb-8">Tentang Program MADU KONCER</h2>

            <div class="flex flex-col md:flex-row items-center gap-10">
                <!-- Gambar ilustrasi -->
                <div class="md:w-1/2">
                    <img src="{{ asset('img/brosur.png') }}" alt="MADU KONCER Program"
                        class="rounded-xl shadow-md w-full object-cover">
                </div>

                <!-- Deskripsi Program -->
                <div class="md:w-1/2 text-gray-800 leading-relaxed text-lg">
                    <p class="mb-4">
                        <strong>MADU KONCER</strong> adalah singkatan dari <strong>Masyarakat Peduli Konsumen
                            Cerdas</strong>, sebuah program layanan pengaduan masyarakat berbasis web yang diluncurkan
                        oleh <strong>Dinas Perindustrian dan Perdagangan (DISPERINDAG) Kabupaten Pamekasan</strong>.
                    </p>

                    <p class="mb-4">
                        <strong>Program ini diselenggarakan secara khusus oleh Bidang Pengawasan dan Perlindungan
                            Konsumen</strong> sebagai bentuk tanggung jawab dalam pengawasan peredaran barang dan jasa
                        serta perlindungan terhadap hak-hak konsumen di wilayah Kabupaten Pamekasan.
                    </p>

                    <p class="mb-4">
                        Layanan ini memberikan kemudahan kepada masyarakat untuk melaporkan produk yang tidak sesuai,
                        kadaluarsa, atau berpotensi merugikan, sekaligus memfasilitasi respons cepat melalui notifikasi
                        otomatis dan pelacakan laporan secara daring.
                    </p>

                    <h3 class="text-xl font-semibold text-green-700 mt-6 mb-2">🎯 Tujuan Program</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Melindungi konsumen dari barang/jasa yang merugikan atau membahayakan.</li>
                        <li>Meningkatkan kesadaran masyarakat agar menjadi konsumen cerdas dan kritis.</li>
                        <li>Meningkatkan transparansi dan efisiensi dalam penanganan pengaduan.</li>
                        <li>Mempermudah pelaporan dan pemantauan oleh petugas lapangan secara real-time.</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-green-700 mt-6 mb-2">🛠 Fitur Unggulan</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Form pelaporan pengaduan berbasis lokasi (Google Maps Integration).</li>
                        <li>Notifikasi otomatis via WhatsApp (berisi token & status pengaduan).</li>
                        <li>Tracking laporan berdasarkan token unik.</li>
                        <li>Dashboard admin & petugas untuk verifikasi dan tindak lanjut cepat.</li>
                        <li>Riwayat laporan tersimpan aman dan transparan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Tata Cara -->
    <section id="tatacara" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-green-700">Tata Cara Pengaduan</h2>

            <!-- Flex scroll horizontal dengan ukuran kartu konsisten -->
            <div class="flex space-x-6 overflow-x-auto pb-4 no-scrollbar">
                @foreach ([['img' => 'tulis.png', 'title' => '1. Tulis Laporan', 'desc' => 'Pengguna mengisi form pengaduan melalui website disertai bukti dan lokasi kejadian.'], ['img' => 'whatsapp.png', 'title' => '2. Notifikasi WhatsApp', 'desc' => 'Sistem mengirim notifikasi otomatis ke WhatsApp pengguna berisi token & status awal.'], ['img' => 'verifikasipengaduan.png', 'title' => '3. Proses Verifikasi', 'desc' => 'Memeriksa dan memverifikasi laporan yang masuk sebelum diproses lebih lanjut.'], ['img' => 'tindaklanjut.png', 'title' => '4. Tindak Lanjut', 'desc' => 'Laporan diteruskan ke petugas lapangan untuk dilakukan pengecekan dan tindakan.'], ['img' => 'success.png', 'title' => '5. Selesai', 'desc' => 'Laporan pengaduan telah selesai ditindak.'], ['img' => 'cekpengaduan.png', 'title' => '6. Cek Pengaduan', 'desc' => 'Cek Status Pengaduan menggunakan Token yang sudah di kirim melalui Whatsapp.']] as $step)
                    <div
                        class="w-72 min-h-[350px] flex-shrink-0 bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition flex flex-col items-center justify-start text-center">
                        <img src="{{ asset('img/' . $step['img']) }}" alt="{{ $step['title'] }}"
                            class="w-20 h-20 mb-4 object-contain">
                        <h3 class="text-xl font-bold mb-2">{{ $step['title'] }}</h3>
                        <p class="text-gray-600 text-sm">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- Berita -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8 text-green-700 text-center">Berita Terbaru</h2>

            @if ($berita->count() > 0)
                <div class="grid gap-8 md:grid-cols-3">
                    @foreach ($berita as $item)
                        <div
                            class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition duration-300">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                    class="w-full h-48 object-cover" />
                            @else
                                <img src="{{ asset('img/default-berita.jpg') }}" alt="Default berita"
                                    class="w-full h-48 object-cover" />
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $item->judul }}</h3>
                                <p class="text-sm text-gray-500 mb-4">Diterbitkan pada
                                    {{ $item->created_at->format('d M Y') }}</p>
                                <p class="text-gray-700 mb-4">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->keterangan), 100, '...') }}</p>
                                <a href="{{ route('berita.detail', $item->id) }}"
                                    class="block px-4 py-2 text-green-600 hover:underline font-semibold">
                                    Baca Selengkapnya
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    {{ $berita->links() }}
                </div>
            @else
                <p class="text-center text-gray-600">Tidak ada berita untuk ditampilkan.</p>
            @endif
        </div>
    </section>


    <section id="lokasi" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">

            <!-- Informasi Lokasi -->
            <div class="md:w-1/2 mb-8 md:mb-0">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('img/lokasi.png') }}" alt="Ikon Lokasi" class="w-10 h-10 mr-2">
                    <h2 class="text-3xl font-bold text-green-700">Lokasi Kami</h2>
                </div>
                <p class="text-gray-800 text-2xl leading-relaxed">
                    Jl. Jokotole No.199, Serkeser, Buddagan, Kec. Pademawu,<br>
                    Kabupaten Pamekasan, Jawa Timur 69323
                </p>
            </div>

            <!-- Google Maps -->
            <div class="md:w-1/2">
                <iframe class="rounded-lg shadow-lg w-full h-80"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.685171644684!2d113.4968894!3d-7.1623802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd77deb76ea1e7f%3A0xb2b3605f8fcaed4!2sDinas%20Perindustrian%20Dan%20Perdagangan%20Kabupaten%20Pamekasan!5e0!3m2!1sid!2sid!4v1733901870413!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </section>

    <!-- KONTAK -->
    <section id="kontak" class="bg-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-green-700 mb-6">Kontak Resmi</h2>
            <p class="text-lg mb-4">Silakan hubungi kami untuk informasi lebih lanjut terkait layanan atau pengaduan:
            </p>

            <ul class="text-lg space-y-3 text-gray-800 mb-6">
                <li>
                    <strong>🌐 Website Resmi :</strong>
                    <a href="https://disperindag.pamekasankab.go.id" target="_blank"
                        class="text-green-600 hover:underline">
                        disperindag.pamekasankab.go.id
                    </a>
                </li>
                <li>
                    <strong>📧 Email :</strong>
                    <a href="mailto:disperindag.pamekasan@gmail.com" class="text-green-600 hover:underline">
                        disperindag.pamekasan@gmail.com
                    </a>
                </li>
            </ul>

            <div class="flex justify-center space-x-6">
                <a href="https://www.facebook.com/disperindagpamekasan" target="_blank"
                    class="text-green-700 hover:text-green-900 text-2xl">
                    <i class="fab fa-facebook"></i> Facebook
                </a>
                <a href="https://www.instagram.com/disperindag_pmk" target="_blank"
                    class="text-green-700 hover:text-green-900 text-2xl">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-green-600 text-white py-4 text-center">
        © {{ now()->year }} MADUKONCER - DISPERINDAG PAMEKASAN | By
        <a href="login" class="underline hover:text-green-200" target="_blank">POLINEMA PSDKU PAMEKASAN</a>
    </footer>

    @include('sweetalert::alert')

    <script>
        document.getElementById('navToggle').addEventListener('click', function() {
            const menu = document.getElementById('navMenu');
            menu.classList.toggle('hidden');
        });

        // Optional: Scroll change navbar style
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
