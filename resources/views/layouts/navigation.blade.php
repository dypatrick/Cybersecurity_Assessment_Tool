<nav class="navbar navbar-expand-lg navbar-light bg border-top border-primary shadow mb-2" style="border-width:3px !important;">
  <a class="navbar-brand" href="/home" >
    <img src="{{asset('/img/MarshallLogo.png')}}" width="60" height="40" alt="Marshall Logo">
  </a>
  <button class="col-md-12 navbar-toggler d-print-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item mr-1">
        <a class="col-md-12 btn btn-outline-dark d-print-none" href="">Home</a>
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
      <li class="nav-item mr-1">
        <a class="col-md-12 btn btn-outline-dark d-print-none" href="">Contact Us</a>
      </li>
      <li class="nav-item mr-1">
        <a class="col-md-12 btn btn-outline-dark d-print-none" href="">About</a>
      </li>
      <li class="nav-item mr-1 float-right">
          <a class="col-md-12 btn btn-outline-dark d-print-none float-right" href="/logout">Logout</a>
      </li>
    </ul>
  </div>  
</nav>