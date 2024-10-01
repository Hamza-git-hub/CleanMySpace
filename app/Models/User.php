<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', // Add 'firstname' to the $fillable array
        'lastname',
        'email',
        'password',
        'profile_photo'
    ];

    protected $table = 'users';

    // Rest of your User model code...
}
