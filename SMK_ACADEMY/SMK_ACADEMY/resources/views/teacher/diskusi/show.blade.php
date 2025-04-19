@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Diskusi: {{ $subMateri->judul }}</h2>

    @forelse($komentars as $komentar)
        <div class="bg-gray-100 p-4 mb-3 rounded">
            <div class="font-semibold">{{ $komentar->user->name }}</div>
            <p>{{ $komentar->isi }}</p>

            {{-- forum reply --}}
            <form action="{{ route('komentar.store', $subMateri->id) }}" method="POST" class="mt-2">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $komentar->id }}">
                <textarea name="isi" rows="2" class="w-full p-2 border rounded mt-1 text-sm" placeholder="Balas komentar ini..."></textarea>
                <button type="submit" class="mt-2 text-sm bg-green-600 text-white px-3 py-1 rounded">Balas</button>
            </form>

            {{-- reply --}}
            @foreach($komentar->balasan ?? [] as $reply)
            <div class="ml-6 mt-2 bg-white border rounded p-3">
                <div class="font-semibold text-sm">{{ $reply->user->name }}</div>
                <p class="text-sm">{{ $reply->isi }}</p>
            </div>
        @endforeach
        
        </div>
    @empty
        <p class="text-gray-500 italic">Belum ada komentar.</p>
    @endforelse
</div>
@endsection
