<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sub_materi_id',
        'isi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subMateri()
    {
        return $this->belongsTo(SubMateri::class);
    }
    public function balasan()
    {
        return $this->hasMany(Komentar::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Komentar::class, 'parent_id');
    }
}
