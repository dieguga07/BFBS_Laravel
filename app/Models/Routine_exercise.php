<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routine_exercise extends Model
{
    use HasFactory;
    protected $table = 'routine_exercise';

    protected $fillable = [
        'exercise_id',
        'routine_id',
        'serie',
        'repetition',
    ];

    
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }

}
