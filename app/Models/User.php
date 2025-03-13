<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Kolom yang disembunyikan (tidak ditampilkan di response JSON)
    protected $hidden = [
        'password',
        'remember_token',
    ];
}