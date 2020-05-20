<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />


</head>

<body>
    <nav>
        <a href="/home"><b>Home</b></a>
        <a href="/blog"><b>Blog</b></a>
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
            <button class="addBlog">New blog</button>
        </div>
        <div class="blog">
            Here will be the blog.
        </div>
    </div>
</body>

</html>