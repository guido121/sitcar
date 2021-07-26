@extends('layouts.app')

@section('content')
           <h1> {{ Str::ucfirst(__('validation.attributes.new'))}}  {{ Str::ucfirst(__('validation.attributes.fuel_efficiency'))}}</h1>
           
            {!! Form::open(['route' => 'fuel_efficiency.store']) !!}
                <div class="form-group">
                    <label for="driver_id">{{ Str::ucfirst(__('validation.attributes.driver'))}}</label>
                    <select class="form-control  @error('driver_id') is-invalid @enderror" name="driver_id">
                        <option value=""> {{ Str::ucfirst(__('validation.attributes.select'))}}</option>
                        @foreach ($drivers as $key => $value)
                            <option value="{{ $key }}" {{ old('driver_id') == $key ? 'selected' : '' }}> 
                                {{ $value }}
                            </option>
                        @endforeach    
                    </select>
                    @error('driver_id')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>


                <div class="form-group">
                    <label for="truck_id">{{ Str::ucfirst(__('validation.attributes.truck'))}}</label>
                    <select class="form-control @error('truck_id') is-invalid @enderror" name="truck_id">
                        <option value=""> {{ Str::ucfirst(__('validation.attributes.select'))}}</option>
                        @foreach ($trucks as $key => $value)
                            <option value="{{ $key }}" {{ old('truck_id') == $key ? 'selected' : '' }}> 
                                {{ $value }} 
                            </option>
                        @endforeach    
                    </select>
                    @error('truck_id')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                
                <div class="form-group">
                    <label for="cart_id">{{ Str::ucfirst(__('validation.attributes.cart'))}}</label>
                    <select class="form-control @error('cart_id') is-invalid @enderror" name="cart_id">
                        <option value=""> {{ Str::ucfirst(__('validation.attributes.select'))}}</option>
                        @foreach ($carts as $key => $value)
                            <option value="{{ $key }}" {{ old('cart_id') == $key ? 'selected' : '' }}> 
                                {{ $value }} 
                            </option>
                        @endforeach    
                    </select>
                    @error('cart_id')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                
                <div class="form-group">
                    <label for="customer_id">{{ Str::ucfirst(__('validation.attributes.customer'))}}</label>
                    <select class="form-control @error('customer_id') is-invalid @enderror" name="customer_id" value="{{ old('customer_id') }}">
                        <option value=""> {{ Str::ucfirst(__('validation.attributes.select'))}}</option>
                        @foreach ($customers as $key => $value)
                            <option value="{{ $key }}" {{ old('customer_id') == $key ? 'selected' : '' }}> 
                                {{ $value }} 
                            </option>
                        @endforeach    
                    </select>

                    @error('customer_id')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                
                <div class="form-group">
                    <label for="weight1">{{ Str::ucfirst(__('validation.attributes.weight1'))}}</label>
                    <input type="text" name="weight1" class="form-control @error('weight1') is-invalid @enderror" value="{{ old('weight1') }}">
              
                    @error('weight1')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label for="weight2">{{ Str::ucfirst(__('validation.attributes.weight2'))}}</label>
                    <input type="text" name="weight2" class="form-control @error('weight2') is-invalid @enderror" value="{{ old('weight2') }}">
                    
                    @error('weight2')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                
                <div class="form-group">
                    <label for="mileage">{{ Str::ucfirst(__('validation.attributes.mileage'))}}</label>
                    <input type="text" name="mileage" class="form-control @error('mileage') is-invalid @enderror" value="{{ old('mileage') }}">
                    @error('mileage')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="fueling1">{{ Str::ucfirst(__('validation.attributes.fueling1')) }} (Tanqueo en Lima)</label>
                    <input type="text" name="fueling1" class="form-control @error('fueling1') is-invalid @enderror" value="{{ old('fueling1') }}">
                   
                    @error('fueling1')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="fueling2">{{ Str::ucfirst(__('validation.attributes.fueling2'))}} (Tanqueo en Ruta)</label>
                    <input type="text" name="fueling2" class="form-control @error('fueling2') is-invalid @enderror" value="{{ old('fueling2') }}">
                    @error('fueling2')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
           
                <div class="form-group">
                    <label for="scanner_fuel_measure">{{ Str::ucfirst(__('validation.attributes.scanner_fuel_measure'))}} </label>
                    <input type="text" name="scanner_fuel_measure" class="form-control @error('scanner_fuel_measure') is-invalid @enderror" value="{{ old('scanner_fuel_measure') }}">
                    @error('scanner_fuel_measure')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="route">{{ Str::ucfirst(__('validation.attributes.route'))}}</label>
                    <input type="text" name="route" class="form-control @error('route') is-invalid @enderror" value="{{ old('route') }}">
                    @error('route')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label for="observation">{{ Str::ucfirst(__('validation.attributes.observation'))}}</label>
                    <textarea name="observation" class="form-control @error('observation') is-invalid @enderror">{{ old('observation') }}</textarea>
                    @error('observation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {!! Form::submit('Register',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

@endsection
