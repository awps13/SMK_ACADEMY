@extends('layouts.app')

@section('content')
<div class="px-8 py-6 max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Materi Saya</h1>

    @if($materis->isEmpty())
        <p class="text-gray-600">Kamu belum mengambil materi apapun.</p>
    @else
        @foreach($materis as $materi)
            <div class="bg-white shadow rounded-xl p-6 mb-5">
                <h2 class="text-xl font-semibold mb-2">{{ $materi->judul }}</h2>
                <p class="text-sm text-gray-600 mb-3">{{ $materi->deskripsi }}</p>
                <a href="{{ route('student.materi.show', $materi->id) }}"
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                    Lihat Materi
                </a>
            </div>
        @endforeach
    @endif
</div>
@endsection
