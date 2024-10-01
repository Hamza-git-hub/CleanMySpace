<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us'; // Assuming your table name is 'contact_form_submissions'

    protected $fillable = ['name', 'email', 'message'];
}
