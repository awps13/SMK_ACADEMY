<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $subMateriId)
{
    $request->validate([
        'isi' => 'required|string|max:1000',
    ]);

    Comment::create([
        'user_id' => auth()->id(),
        'sub_materi_id' => $subMateriId,
        'isi' => $request->isi,
    ]);

    return back()->with('success', 'Komentar berhasil dikirim.');
}

}
