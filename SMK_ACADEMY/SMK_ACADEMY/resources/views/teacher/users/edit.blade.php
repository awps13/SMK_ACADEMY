@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 px-4">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit User</h2>

    <form action="{{ route('teacher.users.update', $user) }}" method="POST" class="bg-white p-6 rounded-lg shadow space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
        </div>

        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-white focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Guru</option>
                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Siswa</option>
            </select>
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('teacher.users.index') }}"
               class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
                Kembali
            </a>

            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded shadow">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
