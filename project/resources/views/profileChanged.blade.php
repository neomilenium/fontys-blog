<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/profile.css') }}" />


</head>

<body>
    <nav>
        <a href="/home"><b>Home</b></a>
        <a href="/blogs"><b>Blog</b></a>
        <div class="nav-right">
            <a href="/profile"><b>Profile</b></a>
            <form style="display:inline-block;" method="POST" action="{{ action('DatabaseController@logout') }}">
                @csrf
                <button type="submit" class="logoutButton"><b>Logout</b></button>
            </form>
        </div>
    </nav>

    <div class="content">
        <div class="profileBox">
            <h1>Profile</h1>
            <h2>Changed successfully!</h2>
            <img style="max-width: 200px; border-radius: 50%; border: 1px solid black;" src="{{$url}}" alt="ProfilePicture" title=""><br><br>
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