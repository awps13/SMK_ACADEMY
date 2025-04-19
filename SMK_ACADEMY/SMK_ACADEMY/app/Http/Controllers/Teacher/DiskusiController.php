<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubMateri;

class DiskusiController extends Controller
{
    public function index()
    {
        $subMateris = \App\Models\SubMateri::with('materi')->get();
        return view('teacher.diskusi.index', compact('subMateris'));
    }
    public function show(SubMateri $subMateri)
    {
        $komentars = $subMateri->komentars()->whereNull('parent_id')->with('balasan', 'user')->get();
        return view('teacher.diskusi.show', compact('subMateri', 'komentars'));
    }
}
