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
    <nav>
        <a href="/"><b>Home</b></a>
        <div class="nav-right">
            <a href="/register"><b>Sign Up</b></a>
            <a href="/login"><b>Login</b></a>
        </div>
    </nav>

    <div class="content">
        <div class="loginBox">
            <h1>Reset Password</h1>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label><br>
                <input id="email" type="email" class="loginInput" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                <br><br>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <button type="submit" class="resetButton">
                    {{ __('Reset Password') }}
                </button>


            </form>
        </div>

    </div>
</body>