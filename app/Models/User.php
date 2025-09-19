<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Primary key ganti jadi id_user
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Kolom yang bisa diisi massal
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // tambahin role sesuai migrate
    ];

    /**
     * Kolom yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting kolom
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke Student
     */
    public function student()
    {
        return $this->hasOne(Student::class, 'id_user', 'id_user');
    }
    public function homeroomTeacher()
{
    return $this->hasOne(HomeroomTeacher::class, 'user_id', 'id_user');
}

}
