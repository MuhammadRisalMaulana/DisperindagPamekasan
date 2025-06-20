<x-guest-layout>
  <div class="min-h-screen flex bg-gray-100">
    <div class="w-full md:w-1/2 flex justify-center items-center p-6 md:p-12">
      <x-auth-card class="relative w-full max-w-2xl bg-white p-14 rounded-3xl shadow-2xl transform hover:scale-105 transition duration-300">

        <!-- Ikon X di pojok kanan atas -->
        <a href="/" class="absolute top-6 right-6 text-gray-500 hover:text-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </a>

        <!-- Logo -->
        <x-slot name="logo">
          <a href="/">
            <img class="w-32 h-32 mx-auto" src="{{ asset('img/logoicon.png') }}" alt="Logo">
          </a>
        </x-slot>

        <!-- Judul Baru -->
        <h2 class="text-4xl font-bold text-gray-800 mb-10 text-center">
          Selamat Datang Kembali
        </h2>

        <x-auth-session-status class="mb-6" :status="session('status')" />
        <x-auth-validation-errors class="mb-6" :errors="$errors" />

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Email -->
          <div class="relative mt-8">
            <input id="email" name="email" type="email" required autofocus
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
            <button type="button" onclick="togglePassword()"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600"
                    aria-label="Tampilkan/Sembunyikan password">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                   viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            </button>
          </div>

          <!-- Ingat Aku -->
          <div class="mt-8 flex items-center">
            <input id="remember_me" type="checkbox"
                   class="h-6 w-6 text-indigo-600 focus:ring-indigo-200 rounded border-gray-300"
                   name="remember" />
            <label for="remember_me" class="ml-3 text-gray-600 text-lg">Ingat aku</label>
          </div>

          <!-- Tombol Login -->
          <div class="mt-10">
            <button type="submit"
                    class="w-full py-5 bg-gradient-to-r from-green-500 to-indigo-600 text-white text-2xl rounded-2xl shadow-lg hover:from-green-600 hover:to-indigo-700 transform hover:scale-105 transition duration-300">
              Login
            </button>
          </div>

        </form>
      </x-auth-card>
    </div>

    <div class="hidden md:flex w-1/2 bg-gradient-to-b from-blue-600 to-indigo-700 items-center justify-center">
      <img src="{{ asset('img/loginvektor.png') }}" alt="Ilustrasi login"
           class="object-cover h-full w-full rounded-r-3xl">
    </div>
  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById('password');
      input.type = (input.type === 'password') ? 'text' : 'password';
    }
  </script>
</x-guest-layout>
