@extends('layouts.app')

@section('content')
           <h1>{{ Str::ucfirst(__('validation.attributes.edit'))}}  {{ Str::ucfirst(__('validation.attributes.cart'))}}</h1>

            <form action="{{ route('cart.update',[$cart->id]) }}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
           
                <div class="form-group">
                    <label for="plate">{{ Str::ucfirst(__('validation.attributes.name'))}}</label>
                    <input type="text" name="plate" class="form-control @error('plate') is-invalid @enderror" value="{{ $cart->plate }}">
                    @error('plate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                <button class='btn btn-primary'>{{ Str::ucfirst(__('validation.attributes.update'))}}</button>
            </form>

@endsection
