<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('serviceType', ['fullService', 'selfService'])->nullable();
            $table->enum('shippingOption', ['selfPickUp', 'delivery'])->nullable();
            $table->string('kilo');
            $table->string('detergent');
            $table->string('fabcon');
            $table->string('bleach');
            $table->string('plastic');
            $table->string('sales');
            $table->enum('serviceStatus', ['pending', 'paid'])->default('pending');

            $table->timestamps();


            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_orders');
    }
};
