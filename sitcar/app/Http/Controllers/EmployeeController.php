<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use App\DailyAttendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        
        $employees = Employee::where('active','=',true)
        ->where('name','like','%'.$search.'%')
        ->paginate(15);

                    
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        

        $entity_data = new Employee($data);
        $entity_data->type = 'CONDUCTOR';    
        $entity_data->save();

        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        
        $data = $request->except(['_token','_method']);
        $employee->fill($data);
        $employee->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $key = trim($request->get('key'));
        
        $fuelEfficiency = Employee::find($key);

        $fuelEfficiency->active = false;
        $fuelEfficiency->save();

        return redirect()->route('employee.index')->with('success','Successfull deleted!');
    }

    public function attendance()
    {
        $employee_id = auth()->user()->employee_id;
        $employee = Employee::find($employee_id);
        $atendances = DailyAttendance::where('employee_id',$employee->id)->get();

        return view('employee.attendance',compact('atendances'));
    }
    public function register_attendance(Request $request){

        $timeZoneStr = 'America/Lima';

        $employee_id = auth()->user()->employee_id;
        $employee = Employee::find($employee_id);
        $success_message = "";

        $attendance = DailyAttendance::where('employee_id',$employee->id)
        ->where('created_date_at',Carbon::now($timeZoneStr)->format('Y-m-d'))                             
        ->first();

        

        if($attendance==NULL)
        {
            $daily_attendance = new DailyAttendance();
            $daily_attendance->employee_id = $employee->id;
            $daily_attendance->starting_daily = Carbon::now($timeZoneStr);
            $daily_attendance->save();

            $attendance = DailyAttendance::where('employee_id',$employee->id)
            ->where('created_date_at',Carbon::now($timeZoneStr)->format('Y-m-d'))                             
            ->first();
        }

        $tipoRegistro = $request->tipoRegistro;

        switch ($tipoRegistro) {
            case '1':
                 $attendance->starting_daily = Carbon::now($timeZoneStr);
                 $success_message = "Se registró la hora de ingreso";
            break;
            case '2':
                  $attendance->start_of_lunch = Carbon::now($timeZoneStr);
                  $success_message = "Se registró la hora de inicio de refrigerio";
            break;
            
            case '3':
                   $attendance->end_of_lunch = Carbon::now($timeZoneStr);
                   $success_message = "Se registró la hora de fin de refrigerio";
            break;
            case '4':
                  $attendance->ending_daily = Carbon::now($timeZoneStr);
                  $success_message = "Se registró la hora de salida";
            break;
            default:    
            break;
        }

        $attendance->save();

        $request->session()->flash('message',  $success_message);
        /*
        if($attendance!=NULL)
        {
            if($attendance->start_of_lunch == NULL)
            {
                $attendance->start_of_lunch = Carbon::now();
                $success_message = "Se registró la hora de inicio de refrigerio";
            }else{
                if($attendance->end_of_lunch == NULL)
                {
                    $attendance->end_of_lunch = Carbon::now();
                    $success_message = "Se registró la hora de fin de refrigerio";
                }
                else
                {
                    if($attendance->ending_daily == NULL)
                    {
                        $attendance->ending_daily = Carbon::now();
                        $success_message = "Se registró la hora de salida";
                    }else{
                        $success_message = "No hay más horas por registrar";
                    }
                    
                }
            }
            $attendance->save();

            $request->session()->flash('message',  $success_message);
        }else{
            $daily_attendance = new DailyAttendance();
            $daily_attendance->employee_id = $employee->id;
            $daily_attendance->save();

            $success_message = "Se registró la hora de ingreso";

            $request->session()->flash('message',  $success_message);
        }
*/
       

        return redirect()->route('employee_attendance');
        
    }
}
