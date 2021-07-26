<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Signin Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
  
  </head>
  <body class="text-center">
    <form class="form-signin"  method="POST" action="{{ route('login') }}">
    @csrf
  <img class="mb-4" src="{{ asset('img/brand/LogoTSV.png') }}" alt="" style="max-width:20em">
  
  <h1 class="h3 mb-3 font-weight-normal">{{ Str::ucfirst(__('auth.sign_in'))}}</h1>
  <label for="inputEmail" class="sr-only">{{ __('E-Mail Address') }}</label>
  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>
  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
  @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
  @enderror
  <div class="checkbox mb-3">
    <label>
      <input name="remember" type="checkbox" value="remember-me"  {{ old('remember') ? 'checked' : '' }}> {{  Str::ucfirst(__('auth.remember_me')) }}
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">   {{  Str::ucfirst(__('auth.start')) }}</button>
  <p class="mt-5 mb-3 text-muted">© 2017-2020</p>
</form>


</body></html>