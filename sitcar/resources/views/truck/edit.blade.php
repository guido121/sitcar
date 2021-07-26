@extends('layouts.app')

@section('content')
           <h1>{{ Str::ucfirst(__('validation.attributes.edit'))}}  {{ Str::ucfirst(__('validation.attributes.fuel_efficiency'))}}</h1>

            <form action="{{ route('truck.update',[$truck->id]) }}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
           
                <div class="form-group">
                    <label for="plate">{{ Str::ucfirst(__('validation.attributes.name'))}}</label>
                    <input type="text" name="plate" class="form-control @error('plate') is-invalid @enderror" value="{{ $truck->plate }}">
                    @error('plate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                <button class='btn btn-primary'>{{ Str::ucfirst(__('validation.attributes.update'))}}</button>
            </form>

@endsection
