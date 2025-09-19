<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeroomTeacher extends Model
{
    protected $table = 'homeroom_teachers';
    protected $primaryKey = 'id_homeroom';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'classroom_id',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'classroom_id', 'id');
    }
}
