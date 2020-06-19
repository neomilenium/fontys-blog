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
            <a href="/createNewBlog" class="addBlog"><b>Create New Blog</b></a>
        </div>
        @foreach($blogs as $blog)

        <div class="blog">
            @if ($blog->img_url != null)
            <div class="blogFlex">
                <div class="imageContainer">
                    <a href="{{ route('blog', ['id' => $blog->id]) }}">
                        <img class="blogImageWithBlur" src="{{url('/storage/blogs/'.$blog->user_id.'/'.$blog->created_at.'.png')}}" alt="ProfilePicture" title="">
                    </a>
                    <br><br>
                </div>
                <div class="textContainer">
                    {{$blog->user_name}}, {{$blog->created_at}}
                    <a href="{{ route('blog', ['id' => $blog->id]) }}">
                        <h1>{{$blog->title}}</h1>
                    </a>
                    {{$blog->text}}
                </div>
            </div>
            @endif

        </div>
        @endforeach

    </div>
</body>

</html>