<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('denomination');
            $table->string('address');
            $table->integer('street_number');
            $table->integer('floor');
            $table->char('zip_code', 5);
            $table->char('city', 30);
            $table->char('region', 30);
            // $table->float('longitude', 2, 4)->nullable(); //TODO vedere bene documentazione
            // $table->float('latitude', 2, 4)->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
