<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Practitioner extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'slug',
        'clinic_name',
        'bio',
        'location',
        'profile_photo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
