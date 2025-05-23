<x-guest-layout>
    <!-- Seluruh background halaman -->
    <div class="min-h-screen bg-gradient-to-r from-green-400 via-green-500 to-green-600 flex items-center justify-center">
        <!-- Container utama untuk login -->
        <div class="max-w-md mx-auto p-6 bg-white bg-opacity-80 shadow-2xl rounded-xl backdrop-blur-md">
            <!-- Logo di bagian atas -->
            <div class="text-center">
                <a href="/">
                    <img src="{{ asset('images/LogoSA.png') }}" alt="Logo" class="h-16 mx-auto mb-4">
                </a>
                <h2 class="text-3xl font-bold text-green-800">Selamat Datang Kembali</h2>
                <p class="text-sm text-gray-600">Silakan masuk ke akun Anda</p>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf

                <!-- Input Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full border-2 border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        placeholder="Email Address"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Input Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                        id="password"
                        class="block mt-1 w-full border-2 border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Lupa Password & Tombol Login -->
                <div class="mt-4 flex items-center justify-between">
                    <a href="{{ route('password.request') }}" class="text-sm text-green-700 hover:underline">
                        {{ __('Forgot Your Password?') }}
                    </a>

                    <button type="submit" class="ml-4 bg-green-600 text-white py-2 px-4 rounded-lg shadow hover:bg-green-700 transition focus:outline-none">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>

            <!-- Sign Up -->
            <div class="mt-6 text-center">
                <span class="text-sm text-gray-700">Belum punya akun?
                    <a href="{{ route('register') }}" class="text-green-700 font-semibold hover:underline">
                        Daftar Sekarang
                    </a>
                </span>
            </div>
        </div>
    </div>
</x-guest-layout>
