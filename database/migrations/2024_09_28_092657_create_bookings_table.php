<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Assuming you have a 'services' table
            $table->string('customer_name');
            $table->string('contact_number');
            $table->string('address'); // Added address field
            $table->date('date');
            $table->decimal('payment_amount', 8, 2); // Added payment amount field
            $table->string('payment_method'); // Added payment method field (e.g., UPI, Credit Card)
            $table->string('upi_id')->nullable(); // Added UPI ID field, nullable since it’s not always required
            $table->string('card_number')->nullable(); // Added card number field, nullable for non-card payments
            $table->string('expiry_date')->nullable(); // Added card expiry date, nullable
            $table->string('cvv')->nullable(); // Added CVV, nullable
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
