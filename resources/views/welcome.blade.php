<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MADUKONCER | DISPERINDAG PAMEKASAN</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('img/logoicon.png') }}">
  <style>
    html { scroll-behavior: smooth; }
  </style>
</head>
<body class="bg-white text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="bg-green-600 text-white shadow-md fixed top-0 w-full z-50">
    <div class="container mx-auto flex items-center justify-between p-4 px-6">
      <div class="flex items-center space-x-3">
        <img src="{{ asset('img/logodisperindag.png')}}" class="w-10 h-10 transform hover:scale-110 transition" alt="Logo" />
        <span class="font-bold text-xl">MADUKONCER</span>
      </div>
      <div class="space-x-6 hidden md:flex">
        <ul class="flex space-x-4">
          <li>
            <a href="/" class="text-white-700 hover:text-blue-500 text-xl font-semibold transition duration-200">
              Home
            </a>
          </li>
          <li>
            <a href="#tatacara" class="text-white-700 hover:text-blue-500 text-xl font-semibold transition duration-200">
              Tata Cara
            </a>
          </li>
          <li>
            <a href="/pengaduan/status" class="text-white-700 hover:text-blue-500 text-xl font-semibold transition duration-200">
              Riwayat Pengaduan
            </a>
          </li>
        </ul>        
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="relative h-screen flex items-center justify-center text-white">
    <img src="{{ asset('img/kantor.jpeg') }}" class="absolute inset-0 w-full h-full object-cover brightness-75 blur-sm z-0" alt="Background" />
    <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
    <div class="container z-20 relative flex flex-col md:flex-row items-center px-6 text-center md:text-left">
      <div class="md:w-1/2">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-snug">Layanan Pengawasan Barang / Jasa Beredar</h1>
        <p class="text-lg mb-6">MADU KONCER [MASYARAKAT PEDULI KONSUMEN CERDAS]<br />DISPERINDAG KABUPATEN PAMEKASAN</p>
        <a href="{{ url('pengaduan')}}" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded shadow-lg transition">
          PENGADUAN KONSUMEN
        </a>
      </div>
      <div class="w-full md:w-3/5 text-center">
        <img class="object-fill mx-60 transform transition hover:scale-110 duration-300 ease-in-out"
          src="{{ asset('img/pamekasan.png')}}" />
      </div>
    </div>
  </section>

  <!-- Tata Cara -->
  <section id="tatacara" class="py-20 bg-gray-100">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-12 text-green-700">Tata Cara Pengaduan</h2>
      <div class="grid gap-10 md:grid-cols-4 text-center">
        @foreach([
          ['img' => 'tulis.png', 'title' => '1. Tulis Laporan', 'desc' => 'Tulis laporan keluhan Anda dengan jelas.'],
          ['img' => 'proses.png', 'title' => '2. Proses Verifikasi', 'desc' => 'Tunggu sampai laporan Anda diverifikasi.'],
          ['img' => 'tindaklanjut.png', 'title' => '3. Tindak Lanjut', 'desc' => 'Laporan Anda sedang dalam tindak lanjut.'],
          ['img' => 'success.png', 'title' => '4. Selesai', 'desc' => 'Laporan pengaduan telah selesai ditindak.']
        ] as $step)
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
          <img src="{{ asset('img/' . $step['img']) }}" alt="{{ $step['title'] }}" class="mx-auto w-20 mb-6 transform hover:scale-110 transition">
          <h3 class="text-xl font-bold mb-2">{{ $step['title'] }}</h3>
          <p class="text-gray-600">{{ $step['desc'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>


  <section id="lokasi" class="py-20 bg-white">
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
          style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
  
    </div>
  </section>
  
  <!-- Footer -->
  <footer class="bg-green-600 text-white py-4 text-center">
    © {{ now()->year }} MADUKONCER DISPERINDAG PAMEKASAN | By
    <a href="/" class="underline hover:text-green-200" target="_blank">POLINEMA PSDKU PAMEKASAN</a>
  </footer>

  @include('sweetalert::alert')

</body>
</html>
