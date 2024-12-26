<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $table = 'courses';

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    // Relacion uno a muchos con el modelo de sections
    public function sections(){
        return $this->hasMany(Section::class, 'course_id', 'id');
    }

    public function lessons(){
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
}
