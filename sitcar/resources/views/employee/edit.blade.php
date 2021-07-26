@extends('layouts.app')

@section('content')
           <h1>{{ Str::ucfirst(__('validation.attributes.edit'))}}  {{ Str::ucfirst(__('validation.attributes.driver'))}}</h1>

            <form action="{{ route('employee.update',[$employee->id]) }}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
           
                <div class="form-group">
                    <label for="name">{{ Str::ucfirst(__('validation.attributes.name'))}}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $employee->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                <button class='btn btn-primary'>{{ Str::ucfirst(__('validation.attributes.update'))}}</button>
            </form>

@endsection
