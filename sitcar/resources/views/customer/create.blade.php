@extends('layouts.app')

@section('content')
           <h1> {{ Str::ucfirst(__('validation.attributes.new'))}}  {{ Str::ucfirst(__('validation.attributes.customer'))}}</h1>
           
            {!! Form::open(['route' => 'customer.store']) !!}
                <div class="form-group">
                    <label for="name">{{ Str::ucfirst(__('validation.attributes.name'))}}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                

                {!! Form::submit('Register',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

@endsection
