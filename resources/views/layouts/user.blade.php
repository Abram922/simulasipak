<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/universal.css') }}">
    
    <title>
        @yield('title')
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
      <div class="col-md-10 mx-auto">
        <nav class="navbar navbar-expand-lg navbar-light" style="font-size: 20px">
          <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size:24px"> <b>Simulasi</b>  PAK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <a class="nav-link"  href="{{ route('userhome') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('boardpak') }}">Perhitungan </a>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Link
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        

        @yield('content1')

      </div >

      </div class="col-md-10 mx-auto">
          
          @yield('content2')
      <div >

      

      </div>


      
   
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>