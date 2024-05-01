<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercise';

    protected $fillable = [
        'name',
        'image',
        'description',
        'serie',
        'repetition',

    ];

    public function exercises()
    {
        return $this->hasMany(Exercise_category::class);
    }

    public function categories()
    {
        return $this->hasMany(Routine_exercise::class);
    }
}
