<x-guest-layout>
  <div class="min-h-screen flex bg-gray-100">
    <!-- Form Login -->
    <div class="w-full md:w-1/2 flex justify-center items-center p-6 md:p-12">
      <x-auth-card class="relative w-full max-w-2xl bg-white p-14 rounded-3xl shadow-2xl transform hover:scale-105 transition duration-300">

        <!-- Tombol X -->
        <a href="/" class="absolute top-6 right-6 text-gray-500 hover:text-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </a>

        <!-- Logo -->
        <x-slot name="logo">
          <a href="/">
            <img class="w-32 h-32 mx-auto" src="{{ asset('img/logoicon.png') }}" alt="Logo">
          </a>
        </x-slot>

        <!-- Judul -->
        <h2 class="text-4xl font-bold text-gray-800 mb-10 text-center">
          Selamat Datang
        </h2>

        <!-- Pesan -->
        <x-auth-session-status class="mb-6" :status="session('status')" />
        <x-auth-validation-errors class="mb-6" :errors="$errors" />
        @if (session('error'))
          <div class="mb-4 font-medium text-sm text-red-600">
            {{ session('error') }}
          </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Email -->
          <div class="relative mt-8">
            <input id="email" name="email" type="email" required autofocus
              pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
              title="Masukkan email yang valid"
              class="peer w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 py-5 text-xl"
              placeholder=" " />
            <label for="email"
              class="absolute left-0 -top-6 text-gray-600 text-lg transition-all
              peer-placeholder-shown:top-4 peer-placeholder-shown:text-2xl peer-placeholder-shown:text-gray-400
              peer-focus:-top-6 peer-focus:text-base peer-focus:text-blue-500">
              Email
            </label>
          </div>

          <!-- Password -->
          <div class="relative mt-10">
            <input id="password" name="password" type="password" required autocomplete="current-password"
              class="peer w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 py-5 text-xl"
              placeholder=" " />
            <label for="password"
              class="absolute left-0 -top-6 text-gray-600 text-lg transition-all
              peer-placeholder-shown:top-4 peer-placeholder-shown:text-2xl peer-placeholder-shown:text-gray-400
              peer-focus:-top-6 peer-focus:text-base peer-focus:text-blue-500">
              Password
            </label>

            <!-- Toggle Password -->
            <button type="button" onclick="togglePassword()"
              class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
              aria-label="Tampilkan/Sembunyikan password">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </button>
          </div>

          <!-- Tombol Login -->
          <div class="mt-10">
            <button id="loginBtn" type="submit"
              class="w-full py-5 bg-gradient-to-r from-green-500 to-indigo-600 text-white text-2xl rounded-2xl shadow-lg hover:from-green-600 hover:to-indigo-700 transform hover:scale-105 transition duration-300">
              Login
            </button>
          </div>

          <!-- Info: Tidak ada lupa password -->
          <p class="text-center text-sm text-gray-500 mt-4">
            Tidak bisa login? Hubungi <a href="https://wa.me/62895414850238" class="text-blue-600 hover:underline">
              Admin via WhatsApp</a>.
          </p>
          <p class="text-center text-xs text-gray-400 mt-1">
            Fitur lupa password otomatis tidak tersedia demi keamanan tambahan.
          </p>

        </form>
      </x-auth-card>
    </div>

    <!-- Gambar Samping -->
    <div class="hidden md:flex w-1/2 bg-gradient-to-b from-blue-600 to-indigo-700 items-center justify-center">
      <img src="{{ asset('img/loginvektor.png') }}" alt="Ilustrasi login"
        class="object-cover h-full w-full rounded-r-3xl">
    </div>
  </div>

  <!-- Script -->
  <script>
    function togglePassword() {
      const input = document.getElementById('password');
      input.type = input.type === 'password' ? 'text' : 'password';
    }

    // Simpan email terakhir
    document.querySelector('form').addEventListener('submit', () => {
      const email = document.getElementById('email').value;
      localStorage.setItem('lastEmail', email);

      // Loading tombol
      const btn = document.getElementById('loginBtn');
      btn.innerText = 'Loading...';
      btn.disabled = true;
    });

    // Isi otomatis email terakhir
    window.addEventListener('load', () => {
      const lastEmail = localStorage.getItem('lastEmail');
      if (lastEmail && !document.getElementById('email').value) {
        document.getElementById('email').value = lastEmail;
      }
    });
  </script>
</x-guest-layout>
