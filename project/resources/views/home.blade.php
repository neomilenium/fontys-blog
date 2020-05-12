<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            color: #000;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;

        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            position: fixed;
            left: 0;
            right: 0;
            z-index: 9999;
            margin-left: 20px;
            margin-right: 20px;
            color: #000;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
        }

        .content:before {
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            z-index: -1;

            display: block;
            background-image: url('background.jpg');
            background-size: cover;
            width: 100%;
            height: 100%;

            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .navigation {
            background-color: rgba(0, 0, 0, 0.8);
            color: #000;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            z-index: 9999;
            padding: 2px;
        }

        ul {
            list-style-type: none;
        }

        a {
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            color: #CC718F;
        }
    </style>
</head>

<body>
    <div class="navigation">
        <ul>
            <li class="nav-item">
                <a class="nav-link" href="/welcome"><b>Welcome<b></a>
            </li>
        </ul>
    </div>

    <div class="content">
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
        TestTestTestTestTest<br>
    </div>
</body>

</html>