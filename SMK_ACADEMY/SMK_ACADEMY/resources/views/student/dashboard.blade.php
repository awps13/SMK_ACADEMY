@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-green-700 mb-2">
                Selamat Datang, {{ Auth::user()->name }} 👋
            </h1>
        </div>

        <!-- Ilustrasi -->
        <div class="flex justify-center mb-10">
            <img src="{{ asset('images/wallpaper.png') }}" alt="Ilustrasi Belajar"
                 class="rounded-2xl shadow-xl w-[500px]">
        </div>

        <div class="text-center">
            <p class="text-lg text-green-600 mb-8">
                Ayo lanjutkan belajar dan pilih materi yang tersedia!
            </p>
        </div>
        <!-- Menu Navigasi -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <!-- Materi -->
            <a href="{{ route('student.materi.index') }}"
               class="transition hover:-translate-y-1 duration-300 bg-white p-6 rounded-2xl shadow-lg hover:bg-green-100">
                <div class="flex flex-col items-center">
                    <i class="fas fa-book-open text-5xl text-green-600 mb-3"></i>
                    <h2 class="text-xl font-semibold mb-1">Pilih Materi</h2>
                    <p class="text-gray-600 text-sm">Lihat dan ambil materi yang tersedia</p>
                </div>
            </a>

            <!-- Materi Saya -->
            <a href="{{ route('student.materi.saya') }}"
               class="transition hover:-translate-y-1 duration-300 bg-white p-6 rounded-2xl shadow-lg hover:bg-blue-100">
                <div class="flex flex-col items-center">
                    <i class="fas fa-folder-open text-5xl text-blue-600 mb-3"></i>
                    <h2 class="text-xl font-semibold mb-1">Materi Saya</h2>
                    <p class="text-gray-600 text-sm">Materi yang sudah kamu ambil</p>
                </div>
            </a>

            <!-- Profil -->
            <a href="{{ route('profile.edit') }}"
               class="transition hover:-translate-y-1 duration-300 bg-white p-6 rounded-2xl shadow-lg hover:bg-yellow-100">
                <div class="flex flex-col items-center">
                    <i class="fas fa-user text-5xl text-yellow-500 mb-3"></i>
                    <h2 class="text-xl font-semibold mb-1">Profil</h2>
                    <p class="text-gray-600 text-sm">Edit informasi pribadi kamu</p>
                </div>
            </a>
        </div>
    </div>
@endsection
