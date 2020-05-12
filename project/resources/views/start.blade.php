<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />


</head>

<body>
    <nav>
        <ul>
            <li>Welcome</li>
            <li>
                <a href="/login"><b>Login</b></a>
            </li>
           
            
        </ul>
    </nav>

    <div class="content">
        <div class="user-table">
            <table>
                <tr>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
    </div>
</body>

</html>