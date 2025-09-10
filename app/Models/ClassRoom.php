<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table = 'class_rooms'; // nama tabel
    protected $fillable = ['class_name']; // kolom yang bisa diisi

    /**
     * Relasi: 1 kelas punya banyak siswa
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'class_room_id');
    }
}
