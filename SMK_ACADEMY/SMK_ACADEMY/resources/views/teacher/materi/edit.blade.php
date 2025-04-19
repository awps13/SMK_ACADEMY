@extends('layouts.app')

@section('content')
<div class="px-8 py-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Edit Materi</h2>

    <form action="{{ route('teacher.materi.update', $materi->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Judul Materi</label>
            <input type="text" name="judul" value="{{ $materi->judul }}"
                   class="w-full border rounded-lg px-4 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-500"
                   required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Deskripsi Materi</label>
            <textarea name="deskripsi"
                      class="w-full border rounded-lg px-4 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-500"
                      rows="4">{{ $materi->deskripsi }}</textarea>
        </div>

        <div>
            <h3 class="text-lg font-semibold text-blue-600 mb-2">Sub Materi</h3>

            <div id="submateri-wrapper" class="space-y-4">
                @foreach($materi->subMateris as $sub)
                <div class="bg-gray-50 p-4 rounded-lg border submateri-group">
                    <input type="text" name="sub_judul[]" value="{{ $sub->judul }}"
                           class="w-full mb-2 border rounded px-3 py-2 focus:outline-none focus:ring" required>

                    <textarea name="sub_deskripsi[]"
                              class="w-full mb-2 border rounded px-3 py-2 focus:outline-none focus:ring">{{ $sub->deskripsi }}</textarea>

                    <input type="text" name="youtube_link[]" value="{{ $sub->youtube_link }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required>
                </div>
                @endforeach
            </div>

            <button type="button" onclick="tambahSubmateri()"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                + Tambah Sub Materi
            </button>
        </div>

        <div>
            <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                Update Materi
            </button>
        </div>
    </form>
</div>

<script>
function tambahSubmateri() {
    const wrapper = document.getElementById('submateri-wrapper');
    const group = document.createElement('div');
    group.classList.add('bg-gray-50', 'p-4', 'rounded-lg', 'border', 'submateri-group', 'mt-4');

    group.innerHTML = `
        <input type="text" name="sub_judul[]" placeholder="Judul Sub Materi"
               class="w-full mb-2 border rounded px-3 py-2 focus:outline-none focus:ring" required>

        <textarea name="sub_deskripsi[]" placeholder="Deskripsi Sub Materi"
                  class="w-full mb-2 border rounded px-3 py-2 focus:outline-none focus:ring"></textarea>

        <input type="text" name="youtube_link[]" placeholder="Link YouTube"
               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required>
    `;

    wrapper.appendChild(group);
}
</script>
@endsection
