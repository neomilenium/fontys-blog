<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Blog</title>
</head>

<body>
    <div class="content">
        <div class="blog">
            <div class="blogFlex">
                <div class="imageContainer">
                    <img class="blogImage" src="{{url('/storage/blogs/'.$id.'/'.$created_at.'.png')}}"><br><br>
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