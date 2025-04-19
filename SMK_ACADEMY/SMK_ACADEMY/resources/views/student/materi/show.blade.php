@extends('layouts.app')

@section('content')
<div class="px-8 py-6 max-w-5xl mx-auto">
    <h1 class="text-3xl font-bold mb-8 text-center">{{ $materi->judul }}</h1>

    @foreach($materi->subMateris as $sub)
        <div class="bg-white shadow-md rounded-xl mb-10 p-6">
            <h2 class="text-2xl font-semibold mb-4 text-green-700">{{ $sub->judul }}</h2>

            {{-- video --}}
            @if($sub->youtube_link)
                <div class="aspect-video mb-4">
                    <iframe class="rounded-xl w-full h-full"
                        src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::afterLast($sub->youtube_link, 'v=') }}"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            @endif

            {{-- deskripsi --}}
            @if($sub->deskripsi)
                <div class="bg-gray-50 border rounded-lg p-4 mb-6">
                    {!! nl2br(e($sub->deskripsi)) !!}
                </div>
            @endif

            {{-- diskusi --}}
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Diskusi</h3>

                {{-- diskusi pertama --}}
                @forelse($sub->komentars->where('parent_id', null) as $komentar)
                    <div class="bg-gray-100 p-4 rounded-lg mb-3">
                        <div class="text-sm font-semibold text-gray-800">{{ $komentar->user->name }}</div>
                        <div class="text-gray-700 text-sm mt-1">{{ $komentar->isi }}</div>

                        {{-- balasan --}}
                        @foreach($komentar->balasan as $reply)
                            <div class="ml-5 mt-3 bg-white border rounded-lg p-3">
                                <div class="text-sm font-semibold text-blue-700">{{ $reply->user->name }}</div>
                                <div class="text-gray-700 text-sm mt-1">{{ $reply->isi }}</div>
                            </div>
                        @endforeach

                        {{-- forum reply --}}
                        <form action="{{ route('komentar.store', $sub->id) }}" method="POST" class="mt-3 ml-5">
                            @csrf
                            <input type="hidden" name="parent_id" value="{{ $komentar->id }}">
                            <textarea name="isi" rows="2" class="w-full border-gray-300 rounded p-2 text-sm mb-2" placeholder="Balas komentar..."></textarea>
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded text-sm">Balas</button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm italic">Belum ada komentar.</p>
                @endforelse

                {{-- form komentar baru --}}
                <form action="{{ route('komentar.store', $sub->id) }}" method="POST" class="mt-6">
                    @csrf
                    <textarea name="isi" rows="3" class="w-full border-gray-300 focus:ring focus:ring-green-300 rounded-lg p-3 text-sm" placeholder="Tulis komentar..."></textarea>
                    <button type="submit" class="mt-3 bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-5 py-2 rounded-lg">
                        Kirim Komentar
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
