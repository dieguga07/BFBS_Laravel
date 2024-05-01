<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_routine extends Model
{
    use HasFactory;

    protected $table = 'user_routine';

    protected $fillable = [
        'routine_id',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }
}
