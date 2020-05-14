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
            <a href="/home"><b>Home</b></a>
            <div class="nav-right">
                <a href="/profile"><b>Profile</b></a>
                <a href="/welcome"><b>Logout</b></a>
            </div>
    </nav>

    <div class="content">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <h1>Hello {{ $user->name }} !</h1>

    </div>
</body>