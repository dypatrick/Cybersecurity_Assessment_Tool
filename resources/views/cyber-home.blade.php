
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SBDC Home Page</title>

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

            .heading {
                text-align: center;
                margin-top: 100px;
            }

            .title {
                font-size: 60px;
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
                color:green;
            }
            
            .description
            {
                text-align: center;
                margin-left: 100px;
                margin-right: 100px;
                font-size: 32px;
            }

            .begin
            {
                background-color: green;
                border: 5px solid green;
                border-radius: 20px;
                color: white;
                padding: 5px 5px;
                text-align: center;
                display: inline-block;
                font-size: 40px;
                margin-top: 25px;
                margin-left: 100px;
                margin-right: 100px;

            }

                    
        </style>
    </head>
  
    <body>
        <a style="position: absolute;left: 20px;width: 200px;height: 120px;padding-top:10px;" href="/">
                    
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
                        <a href="{{ url('/home') }}">Control Panel</a>
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
                    Cyber Security Assessment Tool
                    <br>
                    
                </div>

            <div class="description">
                <div class="explanation">
                No business is immune to cyberattacks or data breach no matter the size of the company.
                Malware lives on most corporate networks.
                Take the West Virginia Small Business Development Center (WV SBDC) assessment to test your knowledge of Cybersecurity and 
                obtain additional knowledge and resources to better keep your business secure from cyberattacks. Click the "Begin Assessment" 
                button below to test your knowledge. 
                <br>
                    
                </div> 
            </div>

            <div class="begin">
                <label class="assessment">
                <a color="inherit" style="color: white; text-decoration:none" href="/cyber-test">Begin Assessment</a>
                <br>
            </div>

            <br>
            <br>
            <br>
            <hr>
            <div class="text-center">
                © Copyright 2019 Marshall University
            <br>
                <small class="text-center">Last update: 11/30/2019</small>
            </div>         

            </div>
        </div>
    </body>
</html>
