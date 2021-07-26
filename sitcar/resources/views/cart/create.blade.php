@extends('layouts.app')

@section('content')
           <h1> {{ Str::ucfirst(__('validation.attributes.new'))}}  {{ Str::ucfirst(__('validation.attributes.cart'))}}</h1>
           
            {!! Form::open(['route' => 'cart.store']) !!}
                <div class="form-group">
                    <label for="plate">{{ Str::ucfirst(__('validation.attributes.plate'))}}</label>
                    <input type="text" name="plate" class="form-control @error('plate') is-invalid @enderror" value="{{ old('plate') }}">
                    @error('plate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                

                {!! Form::submit('Register',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

@endsection
