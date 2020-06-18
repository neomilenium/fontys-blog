<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reset Password</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />


</head>

<body>
    <div class="content">

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">


            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>


            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror



            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>


            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">



            <button type="submit" class="btn btn-primary">
                {{ __('Reset Password') }}
            </button>
        </form>
    </div>
</body>