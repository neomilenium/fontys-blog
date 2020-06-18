<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

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
            <h1>Sign Up</h1>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <label for="name">{{ __('Name') }}</label><br>
                <input id="name" type="text" class="loginInput" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <br><br>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label><br>
                <input id="email" type="email" class="loginInput" name="email" value="{{ old('email') }}" required autocomplete="email">
                <br><br>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label><br>
                <input id="password" type="password" class="loginInput" name="password" required autocomplete="new-password">
                <br><br>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label><br>
                <input id="password-confirm" type="password" class="loginInput" name="password_confirmation" required autocomplete="new-password">
                <br><br>

                <input type="hidden" id="role" name="role" value="user">

                <button type="submit" class="loginButton">
                    {{ __('Sign Up') }}
                </button>
            </form>
            <br><br>
        </div>
    </div>
</body>