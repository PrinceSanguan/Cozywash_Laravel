<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('kilo');
            $table->string('wash');
            $table->string('dry');
            $table->string('fold');
            $table->string('detergent');
            $table->string('fabcon');
            $table->string('bleach');
            $table->string('plastic');
            $table->timestamps();
        });

        // Insert default data
        DB::table('prices')->insert([
            'kilo' => '245',
            'wash' => '65',
            'dry' => '75',
            'fold' => '30',
            'detergent' => '18',
            'fabcon' => '12',
            'bleach' => '12',
            'plastic' => '3',
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
        Schema::dropIfExists('prices');
    }
}

