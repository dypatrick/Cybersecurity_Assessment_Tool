

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
                background-size: 100% 100vh;
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

            .frame 
            {
                width: -750px;
                height: 150px;
                image: center;
                position: absolute;
                margin-top: -175px;
                margin-left: -250px;
            }

            .title {
                font-size: 60px;
                text-align: center;
                color: green;
                margin-top: -350px;
            }

            .links a 
            {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600px;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .text-center
            {
                margin-top: -95px;
                text-align: center;   
            }
        </style>
    </head>
    <body>
        <a style="position:absolute;left: 20px;width: 200px;height: 120px;padding-top:10px;" href="{{ url('/') }}">
                    {{-- {{ config('Bac Son Tech', 'Bac Son Tech') }} --}}
            <img style="width:200px;height:120px;" src="/img/MarshallLogo.png" alt="marshall">
        </a>
        <div class="flex-center position-ref full-height">
            
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="/cyber-home">Home</a>
                    <a href="/cyber-about">About Us</a>
                    <a href="/cyber-resources">Resources</a>
                    <a href="/cyber-contact">Contact</a>
                                            
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
    
            <div class="frame">
                <iframe width="275% 250vh" height="375% 150vh" margin-right="150" src="http://127.0.0.1:8000/quiz/index.html" frameborder="0"></iframe>
                <br>
            </div>

            <div class="heading">
                <div class="title">
                    Cyber Security Assessment
                    <br>
                </div>
            </div>   
        </div>
       
        <div class="text-center">
        <hr>
            © Copyright 2019 Marshall University
        <br>
            <small  class="text-center">"Last update: 11/30/2019"</small>
        </div>
        <br>   
    </body>
</html>
