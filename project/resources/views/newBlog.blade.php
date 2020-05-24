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
        <div class="blogBox">
            <h1>Create a new blog</h1>
            <form action="{{action('BlogController@create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table align="center">
                    <tr>
                        <td>
                            <input type="file" name="blogPicture" class="blogPictureInput"><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Title: </b><input name="title" class="titleInput"><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="text" class="blogTextArea"></textarea><br><br>
                        </td>
                    </tr>

                </table>
                <button class="createButton" type="submit">Create</button>
            </form>
        </div>
    </div>
</body>

</html>