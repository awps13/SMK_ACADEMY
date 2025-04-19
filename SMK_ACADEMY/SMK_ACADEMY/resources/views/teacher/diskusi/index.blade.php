@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Diskusi Sub Materi</h1>

    <div class="space-y-4">
        @foreach ($subMateris as $subMateri)
            <div class="p-4 bg-white rounded shadow">
                <h2 class="text-lg font-semibold">{{ $subMateri->judul }}</h2>
                <p class="text-sm text-gray-600">Bagian dari Materi: <strong>{{ $subMateri->materi->judul ?? '-' }}</strong></p>
                <a href="{{ route('teacher.diskusi.show', $subMateri->id) }}" class="text-green-700 hover:underline mt-2 inline-block">
                    Buka Diskusi
                </a>
            </div>
        @endforeach
    </div>
@endsection
