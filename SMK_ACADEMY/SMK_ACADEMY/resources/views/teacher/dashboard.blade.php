@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-green-700 mb-2">
                Selamat Datang, {{ optional(Auth::user())->name }} 👋
            </h1>
        </div>

        <!-- Gambar Ilustrasi -->
        <div class="flex justify-center mb-10">
            <img src="{{ asset('images/wallpaper.png') }}" alt="Ilustrasi Guru"
                 class="rounded-2xl shadow-xl w-[500px]">
        </div>
        <div class="text-center">
            <p class="text-lg text-green-600 mb-8">
                Silakan kelola materi, siswa, dan diskusi pembelajaran.
            </p>
        </div>
        <!-- Menu Navigasi Guru -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
            <!-- Kelola Materi -->
            <a href="{{ route('teacher.materi.index') }}"
               class="transition hover:-translate-y-1 duration-300 bg-white p-6 rounded-2xl shadow-lg hover:bg-green-100">
                <div class="flex flex-col items-center">
                    <i class="fas fa-chalkboard-teacher text-4xl text-green-600 mb-3"></i>
                    <h2 class="text-xl font-semibold mb-1">Kelola Materi</h2>
                    <p class="text-gray-600 text-sm">Buat & atur materi pembelajaran</p>
                </div>
            </a>

            <!-- Kelola Users -->
            <a href="{{ route('teacher.users.index') }}"
               class="transition hover:-translate-y-1 duration-300 bg-white p-6 rounded-2xl shadow-lg hover:bg-blue-100">
                <div class="flex flex-col items-center">
                    <i class="fas fa-users-cog text-4xl text-blue-600 mb-3"></i>
                    <h2 class="text-xl font-semibold mb-1">Kelola Users</h2>
                    <p class="text-gray-600 text-sm">Atur data siswa & guru</p>
                </div>
            </a>

            <!-- Diskusi -->
            <a href="{{ route('teacher.diskusi.index') }}"
               class="transition hover:-translate-y-1 duration-300 bg-white p-6 rounded-2xl shadow-lg hover:bg-purple-100">
                <div class="flex flex-col items-center">
                    <i class="fas fa-comments text-4xl text-purple-600 mb-3"></i>
                    <h2 class="text-xl font-semibold mb-1">Diskusi</h2>
                    <p class="text-gray-600 text-sm">Pantau & ikut diskusi materi</p>
                </div>
            </a>

            <!-- Profil -->
            <a href="{{ route('profile.edit') }}"
               class="transition hover:-translate-y-1 duration-300 bg-white p-6 rounded-2xl shadow-lg hover:bg-yellow-100">
                <div class="flex flex-col items-center">
                    <i class="fas fa-user-circle text-4xl text-yellow-500 mb-3"></i>
                    <h2 class="text-xl font-semibold mb-1">Profil</h2>
                    <p class="text-gray-600 text-sm">Edit informasi akun</p>
                </div>
            </a>
        </div>
    </div>
@endsection
