

@section('title')
    SBDC Assessment Tool
@endsection


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SBDC Assessment</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url("img/background.jpg");
                background-size: 100% 175vh;
                color: #636b6f;
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

            .frame {
                width: 100%;
                height: 0;
                padding-bottom: 25%;
                position: relative;
                                
            }

            .frame iframe
            {
                position: absolute;
                width: 100%;
                height: 200;
            }

            .title {
                font-size: 84px;
                color: green;
            }

            .links > a {
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
            .text-center
            {
                margin-top: 200px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <a style="position: absolute;left: 20px;width: 200px;height: 120px;padding-top:10px;" href="{{ url('/') }}">
                    {{-- {{ config('Bac Son Tech', 'Bac Son Tech') }} --}}
            <img style="width:200px;height:120px;" src="/img/MarshallLogo.png" alt="marshall">
        </a>
        <div class="flex-center position-ref full-height">
            
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="http://127.0.0.1:8000/cyber-home">Home</a>
                    <a href="http://127.0.0.1:8000/cyber-about">About Us</a>
                    <a href="http://127.0.0.1:8000/cyber-resources">Resources</a>
                    <a href="http://127.0.0.1:8000/cyber-contact">Contact</a>
                                            
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="heading">
                <div class="title m-b-md">
                    Cyber Security Assessment
                    <br>
                    
                </div>


            
            <div class="frame">
                   <iframe width="300% 175vh" height="300% 100vh" src="http://127.0.0.1:8000/quiz/index.html" frameborder="0" allowfullscreen></iframe>
                    <br>
                    
                </div>
                
                <div class="links">
                    {{-- <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="text-center">
        <hr>
            © Copyright 2019 Marshall University
        <br>
            <small  class="text-center">"Last update: 11/30/2019"</small>
        </div>
        <br>   
    </body>
</html>
