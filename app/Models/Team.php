<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow Laravel's naming convention
    protected $table = 'teams';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'name',
        'role',
        'details',
        'image',
    ];
}
