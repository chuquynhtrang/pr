<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("images/bg.jpg");
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                width: 100%;
                height: 100%;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
            }

            .title {
                font-size: 45px;
                color: #FFE57F;
                font-weight: 600;
            }
            .content :hover {
                color: #FFAB40;
                cursor: pointer;
            }
            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links :hover {
                    color: #f9423a;
                }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        @if (Auth::user()->isAdmin())
                            <a href="{{ url('/admin') }}">Trang chủ</a>
                        @elseif (Auth::user()->isTeacher())
                            <a href="{{ url('/teacher') }}">Trang chủ</a>
                        @else
                            <a href="{{ url('user') }}">Trang chủ</a>
                        @endif
                    @else
                        <a href="{{ url('/login') }}">Đăng nhập</a>
                        <!-- <a href="{{ url('/register') }}">Đăng kí</a> -->
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                </div>
            </div>
        </div>
    </body>
</html>
