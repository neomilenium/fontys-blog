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
    <div class="content">
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