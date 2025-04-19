<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Materi;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with('subMateris')->get();
        return view('student.materi.index', compact('materis'));
    }
    public function show($id)
    {
        $materi = Materi::with('subMateris')->findOrFail($id);
        return view('student.materi.show', compact('materi'));
    }
    public function ambilMateri($id)
    {
        $user = auth()->user();
        if ($user->materiDiambil()->where('materi_id', $id)->exists()) {
            return redirect()->back()->with('info', 'Materi sudah pernah diambil.');
        }
        $user->materiDiambil()->attach($id);
        return redirect()->route('student.materi.saya')->with('success', 'Materi berhasil ditambahkan!');
    }
    public function materiSaya()
    {
        $user = auth()->user();
        $materis = $user->materiDiambil()->with('subMateris')->get();
        return view('student.materi.materi_saya', compact('materis'));
    }
}
