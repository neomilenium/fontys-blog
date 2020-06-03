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
        <div class="blogTopBar">
            <a href="/createNewBlog" class="addBlog">Create New Blog</a>
        </div>


        <div class="blog">
            @if ($blog->img_url != null)
            <div class="blogFlex">
                <div class="imageContainer">
                    <img class="blogImage" src="{{$blog->img_url}}" alt="ProfilePicture" title=""><br><br>
                </div>
                <div class="textContainer">
                    {{$blog->user_name}}, {{$blog->created_at}}
                    <h1>{{$blog->title}}</h1>
                    {{$blog->text}}
                </div>
            </div>
            @endif

        </div>


    </div>
</body>

</html>