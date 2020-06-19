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
        <a href="/blogs"><b>Blogs</b></a>
        @if ($isAdmin)
        <a href="/users"><b>Users</b></a>
        @endif
        <div class="nav-right">
            <?php
            $currentID = Auth::id();
            ?>
            <a href="{{ route('profile', ['id' => $currentID]) }}"><b>Profile</b></a>
            <form style="display:inline-block;" method="POST" action="{{ action('DatabaseController@logout') }}">
                @csrf
                <button type="submit" class="logoutButton"><b>Logout</b></button>
            </form>
        </div>
    </nav>

    <div class="content">
        @if ($isAdmin)
        <div class="userTopBar">
            <a href="/users/export"><button class="exportButton">Export as Excel</button></a>
        </div>
        <div class="userBox">
            <h1>Users</h1>

            <table class="userTable">
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th style="width: 150px;">Name</th>
                    <th style="width: 150px;">Email</th>
                    <th style="width: 150px;">Role</th>
                    <th style="width: 150px;"></th>
                </tr>
                @foreach($users as $user)
                <?php
                $id = $user->id
                ?>
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{ route('profile', [$id => $id]) }}"><b>{{$user->name}}</b></td>
                    <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                    <td>{{$user->role}}</td>

                    <td>
                        <a style="color: #FFFFFF;" href="{{ route('profileEdit', [$id => $id]) }}" class="deleteButton">Edit</a>
                        <a style="color: #FFFFFF;" href="{{ route('deleteUser', [$id => $id]) }}" class="deleteButton">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
        @endif
    </div>
</body>