<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise_category extends Model
{
    use HasFactory;

    protected $table = 'exercise_category';

    protected $fillable = [
        'exercise_id',
        'category_id',
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
