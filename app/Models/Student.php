<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Primary key default tetap id
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    // Kolom yang boleh diisi massal
    protected $fillable = [
        'name',
        'class_room_id',
        'id_user', // tambahin relasi ke users
    ];

    /**
     * Relasi ke ClassRoom
     */
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id', 'id');
    }

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
