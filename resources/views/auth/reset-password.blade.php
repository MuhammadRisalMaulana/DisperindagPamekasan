{{-- <x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-4 py-12"
         style="background: linear-gradient(135deg, #3b82f6 0%, #10b981 100%);">

        <div class="bg-white rounded-lg shadow-2xl p-6 sm:p-10 max-w-md w-full relative">
            <!-- Logo -->
            <div class="absolute -top-12 left-1/2 transform -translate-x-1/2">
                <img src="{{ asset('img/logoicon.png') }}"
                     alt="Logo"
                     class="w-20 h-20 rounded-full p-3 bg-white shadow-md" />
            </div>

            <h2 class="text-2xl font-semibold text-gray-900 mb-4 mt-12 text-center">
                Atur Ulang Kata Sandi
            </h2>

            <p class="mb-6 text-gray-500 text-center">
                Masukkan kata sandi baru untuk akun Anda.
            </p>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Hidden token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">>

                <!-- Email -->
                <div class="mb-4">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email"
                             class="block mt-2 w-full"
                             type="email"
                             name="email"
                             :value="old('email', $request->email)"
                             required autofocus />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-label for="password" :value="__('Password Baru')" />
                    <x-input id="password"
                             class="block mt-2 w-full"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                    <x-input id="password_confirmation"
                             class="block mt-2 w-full"
                             type="password"
                             name="password_confirmation"
                             required />
                </div>

                <div class="flex justify-center">
                    <x-button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md shadow-md">
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout> --}}
