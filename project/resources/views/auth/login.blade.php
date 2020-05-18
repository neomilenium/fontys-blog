<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

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
            <h1>Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">{{ __('E-Mail Address') }}</label><br>
                <input class="loginInput" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> <br>
                @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>

                <label for="password">{{ __('Password') }}</label><br>
                <input class="loginInput" type="password" name="password" required autocomplete="current-password"><br>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
                <br><br>

                <button type="submit" class="loginButton">
                    {{ __('Login') }}
                </button>
                <br><br><br>
                @if (Route::has('password.request'))
                <a class="forgotPassword" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif


            </form>
        </div>
    </div>


</body>