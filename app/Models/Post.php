<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $table = 'posts';

    protected $guarded = [
        'created_at',
        'updated_at',
        '_token',
    ];

    protected function casts() : array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relacion inversa de uno a muchos
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Relacion de muchos a muchos con la tabla post_tag
    public function tags(){
        return $this->belongsToMany(Tag::class)
            ->withTimestamps();
    }
}
