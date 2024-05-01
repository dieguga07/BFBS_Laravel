<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    use HasFactory;
    protected $table = 'routine';

    protected $fillable = [
        'name',
    ];

    public function routines()
    {
        return $this->hasMany(User_routine::class);
    }

    public function exercises()
    {
        return $this->hasMany(Routine_exercise::class);
    }
}
