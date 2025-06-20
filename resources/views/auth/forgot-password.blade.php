<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-4 py-12"
          style="background: linear-gradient(135deg, #3b82f6 0%, #10b981 100%);">
        
        <!-- Card Container -->
        <div class="bg-gray-50 rounded-lg shadow-2xl p-6 sm:p-10 transform hover:shadow-3xl hover:translate-y-1 transition duration-500 ease-in-out max-w-md w-full relative">
            <!-- Logo -->
            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2">
                <img src="{{ asset('img/logoicon.png') }}"
                    alt="Logo"
                    class="w-20 h-20 rounded-full p-3 bg-gray-50 shadow-md transform hover:rotate-12 transition duration-500 ease-in-out">
            </div>

            <h2 class="text-2xl font-semibold text-gray-900 mb-4 mt-12">
                Lupa Kata Sandi?
            </h2>

            <p class="mb-6 text-gray-500">
                Tidak masalah! Cukup masukkan email Anda di bawah, dan kami akan mengirim tautan untuk menyetel ulang kata sandi Anda.
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('password.email') }}"> 
                @csrf

                <!-- Email Address -->
                <div class="mb-5">
                    <x-label for="email" :value="__('Alamat Email')" class="text-gray-700 font-semibold" />

                    <x-input id="email" 
                        class="block mt-2 w-full px-4 py-2 rounded-md border-gray-300 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transform hover:shadow-lg transition duration-500 ease-in-out" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        placeholder="Masukkan email Anda…" />
                </div>

                <div class="flex items-center justify-center">
                    <x-button 
                        class="bg-blue-500 hover:bg-blue-600 text-gray-50 font-semibold rounded-md px-5 py-2 shadow-md transform hover:translate-y-1 hover:shadow-lg transition duration-500 ease-in-out">
                        {{ __('Kirim Tautan Reset') }}
                    </x-button>
                </div>

                <p class="text-gray-500 text-center mt-4">
                    Kembali ke <a href="{{ route('login') }}" class="text-blue-500 font-semibold hover:underline">Login</a>
                </p>
            </form>

        </div>
    </div>
</x-guest-layout>
