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
        <div class="profileBox">
            <div class="profileContainer">
                <h1>Profile</h1>
                <?php
                    if (file_exists( public_path() . '/storage/'.$user->id.'/profilePicture.png')) {
                        $exists = true;
                    } else {
                        $exists = false;
                    } 
                ?>
                @if($exists)
                    <img style="max-width: 200px; border-radius: 50%; border: 1px solid black;" src="{{url('/storage/'.$user->id.'/profilePicture.png')}}" alt="ProfilePicture" title=""><br><br>
                @else
                    <img style="max-width: 200px; border-radius: 50%; border: 1px solid black;" src="{{url('/storage/profilePicture.png')}}" alt="ProfilePicture" title=""><br><br>
                @endif
               
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
                <?php
                $id = $user->id
                ?>
                <a href="{{ route('profileEdit', [$id => $id]) }}" class="editButton">Edit</a>
            </div>
            <div class="blogContainer">
                @foreach($blogs as $blog)

                @if ($blog->img_url != null)
                <a href="{{ route('blog', ['id' => $blog->id]) }}">
                    <img style="object-fit: cover;" class="blogImage" src="{{$blog->img_url}}" alt="ProfilePicture" title="">
                </a>
                @endif
                @endforeach
            </div>

        </div>
    </div>
    </div>
</body>

</html>