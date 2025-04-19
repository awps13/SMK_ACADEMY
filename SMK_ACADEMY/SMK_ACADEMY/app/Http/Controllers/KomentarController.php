<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\SubMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request, $subMateriId)
    {
        $request->validate([
            'isi' => 'required|string',
        ]);
    
        Komentar::create([
            'user_id' => auth()->id(),
            'sub_materi_id' => $subMateriId,
            'isi' => $request->isi,
            'parent_id' => $request->parent_id, // bisa null atau id komentar induk
        ]);
    
        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }    

}
