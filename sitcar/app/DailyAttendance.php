<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyAttendance extends Model
{
    protected $table = 'employee_daily_attendance';
    protected $primaryKey = 'id';
    protected $fillable = ['employe_id','ending_daily','end_of_lunch','start_of_lunch'];


}