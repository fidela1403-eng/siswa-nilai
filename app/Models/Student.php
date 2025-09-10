<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Tambahkan kolom yang boleh diisi massal
    protected $fillable = ['name', 'class_room_id'];

    // Relasi ke ClassRoom
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }
}
