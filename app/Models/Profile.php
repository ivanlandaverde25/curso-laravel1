<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use HasFactory, Notifiable;

class Profile extends Model
{    
    use HasFactory;
    
    protected $table = 'profiles';
    
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function address(){
        return $this->hasOne(Address::class, 'profile_id', 'id');
    }
}
