<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        $kursus = Kursus::all();
        return view('teacher.kursus.index', compact('kursus'));
    }

    public function create()
    {
        return view('teacher.kursus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        Kursus::create($request->all());

        return redirect()->route('teacher.kursus.index')->with('success', 'Kursus berhasil dibuat');
    }

    public function edit(Kursus $kursus)
    {
        return view('teacher.kursus.edit', compact('kursus'));
    }

    public function update(Request $request, Kursus $kursus)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $kursus->update($request->all());

        return redirect()->route('teacher.kursus.index')->with('success', 'Kursus berhasil diperbarui');
    }

    public function destroy(Kursus $kursus)
    {
        $kursus->delete();
        return redirect()->route('teacher.kursus.index')->with('success', 'Kursus dihapus');
    }
}
