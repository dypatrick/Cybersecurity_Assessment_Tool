
 
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
        <style>             html, body { 
                background-image: url("img/background.jpg");
                background-size: 100% 150vh;
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
 
            .contact  
            { 
                text-align: center; 
            } 
 
            .title              
            { 
                font-size: 84px; 
            } 
 
            .links > a 
            {                 
                color: #636b6f;                 
                padding: 0 25px;                 
                font-size: 13px;                 
                font-weight: 600;                 
                letter-spacing: .1rem;                 
                text-decoration: none;                 
                text-transform: uppercase; 
            } 
 
            .m-b-md 
            { 
                margin-bottom: 30px;                 
                margin-top: -275px; 
            } 
            .resources 
            { 
                font-size: 84px;                 
                text-align: center;                 
                color:green;                 
                margin-top: -350px;     
            } 
 
            .start             
            { 
                font-size: 30px;                 
                font-weight: bold;                 
                text-align: left;                 
                position: inline;                 
                margin-top: -100px;                 
                margin-left: 50px;                 
                position: absolute;                 
                left: 20px; 
            } 

            .download 
            { 
                font-size: 30px;                 
                font-weight: bold;                 
                text-align: middle;                 
                position: inline;                 
                margin-top: -100px;                 
                margin-right: 375px;                 
                position: absolute;                 
                right: -25px; 
            } 
            .start-description 
            { 
                font-size: 20px;                 
                text-align: left;                 
                position: inline;                 
                margin-top: -0px;                 
                margin-left: 50px;                 
                position: absolute;                 
                left: 20px; 
            } 
            .download-description 
            { 
                font-size: 20px;                 
                text-align: left;                 
                position: inline;                 
                margin-top: 165px;                 
                margin-right: -845px;                 
                position: relative;                 
                word-wrap: break-word;                 
                width: 1050px; 
            } 
            .text-center 
            { 
                margin-top: -200px;                 
                text-align: center; 
            } 
        </style> 

    </head> 
    <body> 
        <a style="position: absolute;left: 20px;width: 200px;height: 120px;paddingtop:10px;" href="{{ url('/') }}"> 
                    {{-- {{ config('Bac Son Tech', 'Bac Son Tech') }} --}} <img style="width:200px;height:120px;" src="/img/MarshallLogo.png" alt="marshall"></a>            
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
 
                <div class="resources"> 
                    Resources  
                </div> 
 
                <div class="start"> 
                Password Security
                    <br> 
                </div> 
 
                <div class="download"> 
                    Internet and Network Security 
                    <br> 
                </div> 
 
                <div class="start-description"> 
                    Evaluate your readiness and learn what the best tools for your business are. 
                    <br> 
                    <br> 
                    <a style="color:green;" 
href="https://smallbusinessbigthreat.com/west-virginia/wp-

content/uploads/sites/7/2018/10/Cybersecurity-Canvas-West-
Virginia.pdf">Cybersersecurity Small Business Awareness Canvas</a><br> 
                    <a style="color:green;" 
href="https://smallbusinessbigthreat.com/west-virginia/wp-
content/uploads/sites/7/2018/10/Cybersecurity-Tools-West-Virginia.pdf">Cybersecurity Tools</a><br> 
                    <a style="color:green;" 
href="https://smallbusinessbigthreat.com/west-virginia/wpcontent/uploads/sites/7/2018/10/Cybersecurity-Glossary-West-
Virginia.pdf">Cybersecurity Glossary</a><br> 
                </div> 
 
                <div class="download-description"> 
                    <br> 
                    These PDF format action plans were developed by SBDC and partners to provide <br>valuable  
                    information to help keep your small business safe.
                    <br> 
                    <br> 
                    <a style="color:green;" 
href="https://smallbusinessbigthreat.com/west-virginia/wp-
content/uploads/sites/7/2018/05/Online-Security-Best-Practices-WV.pdf">Cyber Security Best Practices</a><br> 
                    <a style="color:green;" 
href="https://smallbusinessbigthreat.com/west-virginia/wp-
content/uploads/sites/7/2018/05/What-to-do-if-your-business-is-the-victim-of-a-dataor-security-breach-WV.pdf">What To Do if Your Business is the Victim of a Data Breach</a><br> 
                    <a style="color:green;" 
href="https://smallbusinessbigthreat.com/west-virginia/wp-
content/uploads/sites/7/2018/05/Security-Best-Practices-for-Mobile-Devices-
WV.pdf">Best Practices for Securing Mobile Devices</a><br> 
                    <a style="color:green;" 
href="https://smallbusinessbigthreat.com/west-virginia/wp-
content/uploads/sites/7/2018/05/Connected-Vehicle-Security-Best-Practices-WV.pdf">Best 
Practices for Keeping Your Connected Vehicle Safe</a><br> 
                    <a style="color:green;" 
href="https://smallbusinessbigthreat.com/west-virginia/wp-
content/uploads/sites/7/2018/05/Quick-Tips-for-Staying-Safe-Online-WV.pdf">Quick Tips for Staying Safe Online</a><br> 
                    <a style="color:green;" 
href="https://smallbusinessbigthreat.com/west-virginia/wp-
content/uploads/sites/7/2018/05/Security-Breach-One-Page-Recap-WV.pdf">Security Breach Dos & Do nots Recap</a><br> 
                    <a style="color:green;" href="https://smallbusinessbigthreat.com/west-virginia/wpcontent/uploads/sites/7/2016/10/SC-Canvas-WV.pdf">Cyber Security Small Business 
Awareness Canvas</a><br> 
                    <a style="color:green;" href="https://smallbusinessbigthreat.com/west-virginia/wpcontent/uploads/sites/7/2018/05/Ransomware-Dos-and-Donts.pdf">Ransomware Dos and 
Do nots</a><br> 
                   
                </div> 
 
                <div class="startlinks"> 
                     
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
            Copyright 2019 Marshall University 
        <br> 
            <small  class="text-center">"Last update: 11/30/2019"</small> 
        </div> 
        <br>    
    </body> 
</html>  
 

