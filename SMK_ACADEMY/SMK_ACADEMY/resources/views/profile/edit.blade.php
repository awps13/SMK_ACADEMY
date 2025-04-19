@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4 space-y-6">

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- INFORMASI & EDIT PROFIL --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Informasi Pengguna --}}
        <div class="bg-white p-6 rounded-2xl shadow text-center">
            <h2 class="text-xl font-semibold text-green-700 mb-4">Informasi Pengguna</h2>

            {{-- Ikon Profil --}}
            @php $icon = Auth::user()->photo; @endphp
            <div class="w-24 h-24 mx-auto rounded-full 
                @switch($icon)
                    @case('male') bg-blue-500 @break
                    @case('female') bg-pink-500 @break
                    @case('person') bg-gray-500 @break
                    @case('cat') bg-yellow-500 @break
                    @case('dog') bg-amber-600 @break
                    @case('robot') bg-indigo-500 @break
                    @case('dragon') bg-red-600 @break
                    @case('ghost') bg-purple-500 @break
                    @case('user-ninja') bg-slate-700 @break
                    @case('user-secret') bg-black @break
                    @default bg-gray-200
                @endswitch
                flex items-center justify-center text-white mb-3 shadow-lg">
                <i class="fas fa-{{ $icon == 'person' ? 'user' : $icon }} text-2xl"></i>
            </div>

            {{-- Info --}}
            <div class="text-left text-gray-800 space-y-2">
                <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Role:</strong> 
                    @if(Auth::user()->role == 1)
                        <span class="text-green-600 font-semibold">Guru</span>
                    @else
                        <span class="text-purple-600 font-semibold">Siswa</span>
                    @endif
                </p>
            </div>
        </div>

        {{-- Edit Profil --}}
        <div class="md:col-span-2 bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-semibold text-blue-700 mb-4">Ubah Profil</h2>
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Ikon Profil</label>
                    <div class="grid grid-cols-3 sm:grid-cols-7 gap-5">
                        @php
                            $icons = [
                                'male' => 'blue-500',
                                'female' => 'pink-500',
                                'person' => 'gray-500',
                                'cat' => 'yellow-500',
                                'dog' => 'amber-600',
                                'robot' => 'indigo-500',
                                'dragon' => 'red-600',
                                'ghost' => 'purple-500',
                                'user-ninja' => 'slate-700',
                                'user-secret' => 'black',
                            ];
                        @endphp
                        @foreach($icons as $val => $color)
                            <label class="cursor-pointer">
                                <input type="radio" name="icon" value="{{ $val }}" class="hidden" {{ $icon == $val ? 'checked' : '' }}>
                                <span class="w-10 h-10 rounded-full bg-{{ $color }} flex items-center justify-center text-white hover:scale-110 transition">
                                    <i class="fas fa-{{ $val == 'person' ? 'user' : $val }}"></i>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    {{-- Ubah Password --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-xl font-semibold text-blue-700 mb-4">Ubah Password</h2>
        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                <input type="password" name="current_password" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                <input type="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2" required>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2" required>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Update Password</button>
        </form>
    </div>

    {{-- Hapus Akun --}}
    <div class="bg-red-50 border border-red-200 p-6 rounded-2xl shadow">
        <h2 class="text-xl font-semibold text-red-700 mb-3 flex items-center gap-2">
            <i class="fas fa-exclamation-triangle text-red-500"></i>
            Hapus Akun
        </h2>
        <p class="text-sm text-red-600 mb-4 leading-relaxed">
            Menghapus akun akan menghapus seluruh data Anda secara permanen dari sistem. Tindakan ini <strong>tidak bisa dibatalkan</strong>. Pastikan Anda benar-benar yakin sebelum melanjutkan.
        </p>
        
        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Yakin ingin menghapus akun secara permanen?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold shadow">
                <i class="fas fa-trash-alt mr-2"></i> Hapus Akun Saya
            </button>
        </form>
    </div>

</div>
@endsection
