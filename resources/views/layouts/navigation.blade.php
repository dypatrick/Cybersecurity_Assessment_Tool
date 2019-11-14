<?php
  $currentUser = Session::get('ssouser');
?>

<nav class="navbar navbar-expand-lg navbar-light bg border-top border-primary shadow mb-2" style="border-width:3px !important;">
  <a class="navbar-brand" href="https://marshall.edu/" >
    <img src="{{asset('/img/MarshallLogo.png')}}" width="60" height="40" alt="Marshall Logo">
  </a>
  <button class="col-md-12 navbar-toggler d-print-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item mr-1">
        <a class="col-md-12 btn btn-outline-dark d-print-none" href="/{{config('app.name')}}/">Home</a>
      </li>
      <li class="nav-item mr-1">
        <div class="dropdown">
          <a class="col-md-12 btn btn-outline-primary dropdown-toggle d-print-none" href="#" role="button" data-toggle="dropdown">
            Administration
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="">User Reports</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="">Assessment Reports</a>
          </div>
        </div>
      </li> 
      @if(isset($currentUser))
        <li class="nav-item mr-1">
          <div class="dropdown">
            <a class="col-md-12 btn btn-outline-primary dropdown-toggle d-print-none" href="#" role="button" data-toggle="dropdown">
              Example
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/{{config('app.name')}}/">Sub Example 1</a>
              <a class="dropdown-item" href="/{{config('app.name')}}/">Sub Example 2</a>
              <a class="dropdown-item" href="/{{config('app.name')}}/">Sub Example 3</a>
            </div>
          </div>
        </li>  
      @endif
    </ul>
    <ul class="navbar-nav float-lg-right">   
      @if(isset($currentUser))
        <li class="nav-item text-center text-dark mt-1 mr-4 mt-2"><strong>{{ $currentUser->getName() }}</strong></li>       
        <li class="nav-item">
          <div class="btn-group" role="group">
            <a class="col-md-12 btn btn-info btn-block mt-1 d-print-none" href="/{{config('app.name')}}/" title="Settings"><i class="fas fa-user-cog"></i></a>
            <a class="col-md-12 btn btn-primary btn-block mt-1 d-print-none" href="/{{config('app.name')}}/sso/logout">Log Out</a>          
          </div>
        </li>  
      @else
        <li class="nav-item">
          <div class="btn-group" role="group">
            <a class="col-md-12 btn btn-primary btn-block mt-1 d-print-none" href="https://sso.k12.wv.us/0/user/login">Log In</a>          
          </div>
        </li>
      @endif  
    </ul>
  </div>  
</nav>