<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{
    use HasFactory;

    protected $fillable = ['materi_id', 'judul', 'deskripsi', 'youtube_link'];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
    public function siswaPengambil()
    {
        return $this->belongsToMany(User::class, 'pelajaran_siswa')->withTimestamps();
    }
    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
