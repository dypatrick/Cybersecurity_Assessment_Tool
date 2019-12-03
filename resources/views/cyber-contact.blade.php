

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

            .contact 
            {
                text-align: center;
            }

            .title 
            {
                font-size: 84px;

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
                margin-top: -200px;
            }
            .contact-page
            {
                font-size: 30px;
                text-align: center;
                margin-top: 400px;
                color: green;
            }

            .contact
            {
                font-size: 30px;
                text-align: center;
                margin-top: 75px;
            }
            
            .number
            {
                background-color: green;
                border: 5px solid green;
                border-radius: 20px;
                color: white;
                padding: 5px 5px;
                text-align: left;
                display: inline-block;
                font-size: 30px;
                margin-top: 5px;
                margin-left: 100px;
                margin-right: 100px;
            }
            .email
            {
                background-color: green;
                border: 5px solid green;
                border-radius: 20px;
                color: white;
                padding: 5px 75px;
                text-align: center;
                font-size: 30px;
                margin-top: 5px;
                margin-left: 100px;
                margin-right: 100px;
            }

            .location
            {
                background-color: green;
                border: 5px solid green;
                border-radius: 20px;
                color: white;
                padding: 5px 5px;
                text-align: center;
                display: inline-block;
                font-size: 30px;
                margin-top: 5px;
                margin-left: 100px;
                margin-right: 100px;
            }
            .text-center
            {
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

            <div class="contact-page">
                <div class="title m-b-md">
                    Contact Us  
                </div>
            
            <div class="contact">
                General Phone
            </div>

            <div class="number">
                <label class="num">
                <a style="color: white; text-decoration:none"> (304) 558-2960 </a>

                <br>
            </div>
                
            <div class="contact">
                Email
            </div>

            <div class="email">
                <label class="em">
                <a style="color: white; text-decoration:none"> askme@wv.gov </a>
                <br>
            </div>

            <div class="contact">
                Address
            </div>

            <div class="location">
                <label class="loc">
                    <a style="color: white; text-decoration:none"> 
                    WV SBDC Lead Center<br>
                    State Capitol Complex<br>
                    1900 Kanawha Boulevard East<br>
                    Building 3, Suite 600<br>
                    Charleston, West VIrginia 25305 </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <hr>
        <div class="text-center">
            © Copyright 2019 Marshall University
        <br>
            <small  class="text-center">"Last update: 11/30/2019"</small>
        </div>
        <br>   
    </body>
</html>
