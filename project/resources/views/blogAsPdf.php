<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>
    <div class="content">
        <div class="blog">
            <div class="blogFlex">
                <div class="imageContainer">
                    <img class="blogImage" src="{{$blog->img_url}}" alt="ProfilePicture" title=""><br><br>
                </div>
                <div class="textContainer">
                    {{$name}}, {{$created_at}}
                    <h1>{{$title}}</h1>
                    {{$text}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>