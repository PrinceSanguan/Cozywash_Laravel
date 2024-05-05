<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('contact');
            $table->string('password');
            $table->string('address');
            $table->enum('userType', ['admin', 'staff', 'customer'])->default('customer');
            $table->timestamps();
        });

        // Insert default data
        DB::table('users')->insert([
            'firstName' => 'Juan',
            'lastName' => 'Dela Cruz',
            'email' => 'admin@gmail.com',
            'contact' => '09123456789',
            'password' => Hash::make('admin'), 
            'address' => 'Manila',
            'userType' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

