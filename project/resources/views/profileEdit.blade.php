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
        <div class="profileEditBox">
            <h1>Profile</h1>
            <?php
            $id = $user->id;
            if (file_exists( public_path() . '/storage/'.$user->id.'/profilePicture.png')) {
                $exists = true;
            } else {
                $exists = false;
            } 
            ?>
            @if($exists)
            <img style="width: 200px; border-radius: 50%; border: 1px solid black;" src="{{url('/storage/'.$id.'/profilePicture.png')}}" alt="ProfilePicture" title=""><br><br>
            @else
            <img style="max-width: 200px; border-radius: 50%; border: 1px solid black;" src="{{url('/storage/profilePicture.png')}}" alt="ProfilePicture" title=""><br><br>
            @endif

            <form action="{{action('DatabaseController@save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <input type="file" name="profilePicture" class="profilePictureInput">
                <table align="center">
                    <tr>
                        <td style="width: 100px;"><b>Name:</b></td>
                        <td><input name="name" class="nameInput" value="{{ $user->name }}"></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;"><b>Email:</b></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </table>
                <br><br>
                <button class="editButton" type="submit">Save</button>
            </form>
        </div>
    </div>
</body>

</html>