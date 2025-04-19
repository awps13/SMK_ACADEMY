@extends('layouts.app')

@section('content')
<div class="px-8 py-4">
    <h1 class="text-2xl font-bold mb-4">Materi Tersedia</h1>

    <div class="flex justify-between items-center mb-6">
        <form action="{{ route('student.materi.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari Materi"
                class="border rounded-full px-4 py-2 w-64 shadow focus:outline-none focus:ring" />
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($materis as $materi)
        <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition-all flex flex-col justify-between h-25">
            <h2 class="text-lg font-semibold mb-4">{{ $materi->judul }}</h2>
            <form action="{{ route('student.ambil.materi', $materi->id) }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit"
                    class="flex items-center justify-center gap-2 bg-green-600 text-white px-4 py-2 rounded-full text-sm hover:bg-green-700 transition-all hover:scale-105 w-full shadow">
                    <i class="fas fa-book-reader"></i>
                    Ambil Materi
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection