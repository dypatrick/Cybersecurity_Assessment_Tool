<!--This is the layout of all your pages. It contains parts that can be populated by other pages, such as 
    navigation, footers, content areas, etc.-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--This token is often required for AJAX and forms.-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!--Yield waits on content from a view. Page-specific titles will be displayed here-->
        <title>@yield('title')</title>

        <!--Bootstrap 4-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--WVDE Custom Bootstrap-->
        <link rel="stylesheet" href="{{asset('/css/WVDE.css')}}">
        <!--Fontawesome Icons-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <!--Favicon-->
        <link rel="shortcut icon" href="{{asset('/img/wvdelogo.jpeg')}}" type="image/x-icon" />
        <!--Fira Sans Font-->
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!--Yield waits on content from a view-->
        @yield('specificCSS')
    </head>
    <body>
        <div class="container-fluid w-85">
            <!--Include includes a php page directly into this section-->
            @include('layouts.navigation')

            <br>

            @include('layouts.errors')

            @include('layouts.success')
            
            @yield('content')

            <br>

            @include('layouts.footer')
        </div>

        <!--Be aware that the default Bootstrap uses the jquery slim build which does not include AJAX-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        @yield('specificJS')
    </body>
</html>