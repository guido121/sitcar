@extends('layouts.app')

@section('head-content')
<style>
.clock{
    font-size:3em;
    font-weight:bold;
}
</style>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
@endsection
@section('content')
           <h1> {{ Str::ucfirst(__('validation.attributes.attendance'))}}</h1>
           
        <div class="row">
            <div class="date">
                <span id="weekDay" class="weekDay"></span>, 
                <span id="day" class="day"></span> de
                <span id="month" class="month"></span> del
                <span id="year" class="year"></span>
            </div>
        </div>
        <div class="row">
            <div class="clock">
                <span id="hours" class="hours"></span> :
                <span id="minutes" class="minutes"></span> :
                <span id="seconds" class="seconds"></span>
            </div>
        </div>

        
        <div class="row">
            {!! Form::open(['route' => 'register_attendance']) !!}

                <select id="cbTipoRegistroHora" name="tipoRegistro" class="">
                                <option value="1">Ingreso</option>
                                <option value="2">Inicio refrigerio</option>
                                <option value="3">Fin refrigerio</option>
                                <option value="4">Salida</option>
                </select>
                <button type="button" id="btnRegistrarHora" class="btn btn-info">Registrar hora</button>  
                <div id="panelConfirmacion">
                    
                    <div class="mt-2 alert alert-info">
                        <p>¿Está seguro de que desea confirmar el registro de la hora?</p>
                        {!! Form::submit('Si',['class' => 'btn btn-success','id' => 'btnConfirmar']) !!}
                        <button type="button" onclick="window.location.reload(true);" class="btn btn-warning">No</button>
                    </div>
                </div>
                
            {!! Form::close() !!}
        </div>

        <div class="row">
        @if(session()->has('message'))
            <div class="mt-2 alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        </div>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Ingreso</th>
                            <th>Inicio refrigerio</th>
                            <th>Fin refrigerio</th>
                            <th>Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($atendances as $atendance)
                        <tr>
                            <td>{{ $atendance->starting_daily }}</td>
                            <td>{{ $atendance->start_of_lunch }}</td>
                            <td>{{ $atendance->end_of_lunch }}</td>
                            <td>{{ $atendance->ending_daily }}</td>
                        </tr>
                    @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
        

        <script  type="application/javascript">
    var udateTime = function() {
        let currentDate = new Date(),
            hours = currentDate.getHours(),
            minutes = currentDate.getMinutes(), 
            seconds = currentDate.getSeconds(),
            weekDay = currentDate.getDay(), 
            day = currentDate.getDate(), 
            month = currentDate.getMonth(), 
            year = currentDate.getFullYear();
    
        const weekDays = [
            'Domingo',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sabado'
        ];
    
        document.getElementById('weekDay').textContent = weekDays[weekDay];
        document.getElementById('day').textContent = day;
    
        const months = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];
    
        document.getElementById('month').textContent = months[month];
        document.getElementById('year').textContent = year;
    
        document.getElementById('hours').textContent = hours;
    
        if (minutes < 10) {
            minutes = "0" + minutes
        }
    
        if (seconds < 10) {
            seconds = "0" + seconds
        }
    
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;
    };
    
    udateTime();
    
    setInterval(udateTime, 1000);

    $(document).ready(function(){
        $('#panelConfirmacion').hide();
        $('#btnRegistrarHora').on('click',function(e){
            e.preventDefault();
            $('#panelConfirmacion').show();
        });
    });
</script>
@endsection
