@extends('layouts.app')

@section('content')

            <h1> {{ Str::ucfirst(__('validation.attributes.fuel_efficiency'))}}</h1>
            <div class="row" style="margin-top:10px">
                <div class="col-md-4">
                    <form class="form-inline search-form" action="{{ route('fuel_efficiency.index') }}" method="GET">
                        @csrf
                        <div class="input-group input-group">
                            <input type="search" name="search" class="form-control form-control-navbar" placeholder=" {{ Str::ucfirst(__('validation.attributes.search'))}}">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="submit">
                                    {{ Str::ucfirst(__('validation.attributes.search'))}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              
            </div>
            
          
           <a href="{{ route('fuel_efficiency.create') }}" class="btn btn-primary">{{ Str::ucfirst(__('validation.attributes.new'))}}</a>
           <table class="table table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Camión</th>
                    <th>Conductor</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($FuelEffiencies as $e)
                <tr>
                    <td>{{ $e->id }}</td>
                    <td>{{ $e->plate }}</td>
                    <td>{{ $e->name }}</td>
                    <td class="table-buttons d-flex">
                        <a href="{{ route('fuel_efficiency.edit',$e->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('fuel_efficiency.destroy',$e->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="key" value="{{ $e->id }}">
                            <button style="margin-left:5px" type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
           </table>

           
            {{ $FuelEffiencies->links() }}

@endsection
