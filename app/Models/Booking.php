<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'customer_name',
        'contact_number',
        'date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class); // Assuming you have a Service model
    }
}
