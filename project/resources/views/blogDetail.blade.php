<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/blog.css') }}" />



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
        <div class="blogTopBar">
            <a href="{{ route('exportPdf', ['id' => $blog->id]) }}" class="addBlog"><b>Export as PDF</b></a>
        </div>


        <div class="blog">
            <div class="blogFlex">
                <div class="imageContainer">
                    <img class="blogImage" src="{{url('/storage/blogs/'.$blog->user_id.'/'.$blog->created_at.'.png')}}" alt="ProfilePicture" title=""><br><br>
                </div>
                <div class="textContainer">
                    {{$blog->user_name}}, {{$blog->created_at}}
                    <h1>{{$blog->title}}</h1>
                    {{$blog->text}}
                </div>
            </div>

        </div>


    </div>
</body>

</html>