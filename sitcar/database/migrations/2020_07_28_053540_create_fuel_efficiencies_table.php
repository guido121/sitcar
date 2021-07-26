<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelEfficienciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_efficiencies', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->integer('truck_id');
            $table->integer('cart_id');
            $table->integer('customer_id');
            $table->decimal('weight1', 20,10);
            $table->decimal('weight2', 20,10);
            $table->integer('mileage');
            $table->decimal('fueling1', 20,10);
            $table->decimal('fueling2', 20,10);
            $table->decimal('scanner_fuel_measure',20,10);
            $table->string('route');
            $table->string('observation');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('fuel_efficiencies');
    }
}
