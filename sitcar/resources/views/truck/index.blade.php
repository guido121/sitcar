@extends('layouts.app')

@section('content')
           
            
           <h1> {{ Str::ucfirst(__('validation.attributes.truck'))}}</h1>
           <div class="row" style="margin-top:10px">
                <div class="col-md-4">
                    <form class="form-inline search-form" action="{{ route('truck.index') }}" method="GET">
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
           <a href="{{ route('truck.create') }}" class="btn btn-primary">{{ Str::ucfirst(__('validation.attributes.new'))}}</a>
           <table class="table table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Fecha creación</th>                    
                </tr>
            </thead>
            <tbody>
                
                @foreach($trucks as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->plate }}</td>
                    <td class="table-buttons d-flex">
                        <a href="{{ route('truck.edit',$c->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('truck.destroy',$c->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="key" value="{{ $c->id }}">
                            <button style="margin-left:5px" type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
           </table>
           
            {{ $trucks->links() }}

@endsection
