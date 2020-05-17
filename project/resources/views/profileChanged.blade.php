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
            <a href="/"><b>Logout</b></a>
        </div>
    </nav>

    <div class="content">
        <div class="profileBox">
            <h1>Profile</h1>
            <h2>Changed successfully!</h2>
            <table align="center">
                <tr>
                    <td style="width: 100px;"><b>Name:</b></td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td style="width: 100px;"><b>Email:</b></td>
                    <td>{{ $user->email }}</td>
                </tr>
            </table>
            <br><br>
            <a href="/profileEdit" class="editButton">Edit</a>
        </div>
    </div>
</body>

</html>