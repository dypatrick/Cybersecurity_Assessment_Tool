
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SBDC Assessment</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body
             {
                background-color: #fff;
                background-image: url("img/background.jpg");
                background-size: 100% 250vh;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height 
            {
                height: 100vh;
            }

            .flex-center 
            {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref 
            {
                position: relative;
            }

            .top-right 
            {
                position: absolute;
                right: 10px;
                top: 18px;
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
            
            .content 
            {
                text-align: center;
                margin-top: -250px;
                color:green;
                margin-bottom: 30px;
                position: absolute;

            }
            
            .description
            {
                text-align: left;
                margin-left: 100px;
                margin-right: 100px;
                margin-top: 50px;
                font-size: 32px;
                position: relative;
            }

            .mission
            {
                align: left;
                position:absolute;
            }

            .values
            {
                text-align: right;
                margin-top: 0px;
                margin-left: -100px;
                margin-right: 0px;
                position: absolute;
                width: 1050px;
            }
            .vision
            {
                text-align: right;
                margin-top: -45px;
                margin-left: 450px;
                margin-right: 0px;
                position: absolute;
                width: 1050px;
            }
            .text-center
            {
                margin-top: 650px;
                text-align: center;
            }
                 
                 
        </style>
    </head>
  
    <body>
        <a style="position: absolute;left: 20px;width: 200px;height: 120px;padding-top:10px;" href="http://127.0.0.1:8000">
                    
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
            
            <div class="content">
                <div class="title m-b-md">
                    About Us
                    <br>
                </div>
            </div>
            <div class="description">
                <div class="explanation">
                    <br>
                    <p> The West Virginia Small Business Development Center provides expert guidance to help small businesses succeed.
                    We provide the services and assistance your business needs throughout the development process including concept,
                    startup and growth. Our statewide network of business coaches partner with you - and collaborate with each other - 
                    to help you move your business to the next level. Many of our coaches have entrepreneurial experience themselves.
                    WV SBDC business coaches are highly skilled individuals who have professional certifications ranging from exporting,
                    innovation, technology and economic development, to finance, management, marketing and entrepreneurship. 
                    Our coaches can guide you in how to write business plans, manage projects effectively and find greater access to capital.
                    </p>
                </div> 
                <div class="mission">
                    <br>
                    <img src="/img/mission.png">
                </div>
                <br>
                <div class="values"> 
                    <img src="/img/values.png">
                </div>
                <br>
                <div class="vision"> 
                    <img src="/img/vision.png">
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
