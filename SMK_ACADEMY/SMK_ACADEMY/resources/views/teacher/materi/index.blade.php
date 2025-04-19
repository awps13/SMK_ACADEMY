@extends('layouts.app')

@section('content')
<div class="px-8 py-6 max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Kelola Materi</h1>
        <a href="{{ route('teacher.materi.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            + Tambah Materi
        </a>
    </div>

    @forelse($materis as $materi)
        <div class="bg-white rounded-xl shadow mb-6 p-6">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-semibold text-blue-700">{{ $materi->judul }}</h2>
                <div class="flex gap-2">
                    <a href="{{ route('teacher.materi.edit', $materi->id) }}"
                       class="text-yellow-600 hover:text-yellow-700 font-medium text-sm">
                        Edit
                    </a>
                    <form action="{{ route('teacher.materi.destroy', $materi->id) }}" method="POST"
                          onsubmit="return confirm('Hapus materi ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-600 hover:text-red-700 font-medium text-sm">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>

            <p class="text-gray-700 mb-4">{{ $materi->deskripsi }}</p>

            <div>
                <h3 class="font-semibold text-sm text-gray-600 mb-1">Sub Materi:</h3>
                <ul class="list-disc list-inside text-sm text-gray-800">
                    @forelse($materi->subMateris as $sub)
                        <li>{{ $sub->judul }}</li>
                    @empty
                        <li class="text-gray-400 italic">Belum ada sub materi</li>
                    @endforelse
                </ul>
            </div>
        </div>
    @empty
        <p class="text-gray-500">Belum ada materi yang ditambahkan.</p>
    @endforelse
</div>
@endsection
