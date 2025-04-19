<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'materi_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function subMateri()
    {
        return $this->belongsTo(SubMateri::class);
    }
    
    
}
