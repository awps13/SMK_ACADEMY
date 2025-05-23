<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function isTeacher()
    {
        return $this->role == 1;
    }

    public function isStudent()
    {
        return $this->role == 2;
    }

    public function materials() {
        return $this->hasMany(Material::class, 'teacher_id');
    }

    public function materiDiambil()
    {
        return $this->belongsToMany(Materi::class, 'materi_siswa')->withTimestamps();
    }    
    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
