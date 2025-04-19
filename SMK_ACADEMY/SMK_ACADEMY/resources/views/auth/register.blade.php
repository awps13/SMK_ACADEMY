<x-guest-layout>
    <!-- Background Gradasi Hijau -->
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-green-400 via-green-500 to-green-600">
        <div class="w-full sm:max-w-md px-8 py-6 bg-white bg-opacity-90 shadow-xl rounded-xl backdrop-blur-md">
            <!-- Logo -->
            <div class="text-center mb-6">
                <img src="{{ asset('images/LogoSA.png') }}" alt="SMK Academy Logo" class="w-16 h-16 mx-auto">
                <h1 class="text-3xl font-bold text-green-800 mt-4">Daftar Akun</h1>
                <p class="text-sm text-gray-600">Bergabung dan mulai belajar sekarang!</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Full Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                    <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Password Confirmation -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Aksi -->
                <div class="flex items-center justify-between mt-4">
                    <div class="text-sm">
                        <a href="{{ route('login') }}" class="text-green-700 hover:underline">
                            Sudah punya akun? Login
                        </a>
                    </div>

                    <x-primary-button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow">
                        {{ __('Daftar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
