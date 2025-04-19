<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMK Academy</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-green-50 text-gray-900 antialiased">

    <!-- navbar -->
    <nav class="bg-green-700 text-white py-4 px-6 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/LogoSA.png') }}" alt="SMK Academy Logo" class="w-12 h-12">
                <h1 class="text-xl font-bold">SMK Academy</h1>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="focus:outline-none">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden mt-2 px-4">
            <a href="{{ route('login') }}" class="block py-2 hover:bg-green-600 rounded">Login</a>
            <a href="{{ route('register') }}" class="block py-2 hover:bg-green-600 rounded">Register</a>
        </div>
    </nav>

    <section class="flex flex-col-reverse lg:flex-row items-center justify-between max-w-7xl mx-auto px-6 py-16">
        <div class="w-full lg:w-1/2 space-y-6 text-center lg:text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-green-800 leading-snug">
                Selamat Datang di<br><span class="text-green-600">SMK Academy</span>
            </h1>
            <p class="text-lg text-gray-700">Bangun masa depanmu dengan pendidikan berbasis keterampilan. Akses materi pembelajaran, latihan soal, dan pelatihan dari para ahli.</p>
            <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                <a href="{{ route('register') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg shadow hover:bg-green-700 transition">
                    Daftar Sekarang
                </a>
                <a href="{{ route('login') }}" class="text-green-700 font-semibold hover:underline py-3">
                    Sudah punya akun?
                </a>
            </div>
        </div>
        <div class="w-full lg:w-1/2 mb-10 lg:mb-0">
            <img src="{{ asset('images/backgroundSMKAC.jpg') }}" alt="SMK Academy Image" class="w-full h-auto drop-shadow-xl rounded-xl">
        </div>
    </section>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>
</html>
