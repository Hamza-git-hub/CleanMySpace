<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatinumService extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'address', 'room', 'date'];

    protected $primarykey = 'id';

    protected $table = 'platinum_services';
}
