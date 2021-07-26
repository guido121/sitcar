<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateEmployeeDailyAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_daily_attendance', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->dateTime('starting_daily', 0)->nullable();
            //$table->dateTime('starting_daily', 0)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('start_of_lunch', 0)->nullable();
            $table->dateTime('end_of_lunch', 0)->nullable();
            $table->dateTime('ending_daily', 0)->nullable();
            $table->date('created_date_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            
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
        Schema::dropIfExists('employee_daily_attendance');
    }
}
