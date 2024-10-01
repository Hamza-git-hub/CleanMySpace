<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_services', function (Blueprint $table) {
            $table->id();
        $table->string('firstname');
        $table->string('lastname');
        $table->string('email');
        $table->string('phone');
        $table->string('address');
        $table->string('room');
        $table->date('date');
        $table->string('status')->nullable();

        $table->decimal('payment_amount', 8, 2)->nullable();
        $table->string('payment_status')->default('Pending');
        // Add payment_amount column
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premium_services');
    }
}
