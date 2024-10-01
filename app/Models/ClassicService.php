<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassicService extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'address', 'service_type', 'date'];

    protected $primarykey = 'id';

    protected $table = 'classic_services';
}
