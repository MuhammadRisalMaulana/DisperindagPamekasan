{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img class="w-20 h-20 " src="{{ asset('img/logodisperindag.png')}} " alt="Logo">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Alamat -->
            <div class="mt-4">
                <x-label for="alamat" :value="__('Alamat')" />

                <x-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('No. HP')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah terdaftar?') }}
                </a>

                <x-button class="ml-3 bg-blue-500 text-white font-bold rounded-md my-3 py-3 px-4 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:bg-blue-500 hover:scale-105 duration-300 ease-in-out">
                    {{ __('Daftar') }}
                </x-button>
                
                
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
