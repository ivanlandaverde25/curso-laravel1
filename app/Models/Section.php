<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;

    protected $table = 'sections';

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    // Relacion uno a muchos con las secciones
    public function lessons(){
        return $this->hasMany(Lesson::class, 'section_id', 'id');
    }
}
