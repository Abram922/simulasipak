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
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('lampiran') }}">Lampiran </a>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
                  </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{asset('/profil')}}">Profil</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </li>
                    </ul>
                  
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div >        

        @yield('content1')
        <br>

        <div class="container" style="background-color: #F9F9FE">
        @yield('content2')
        </div>

        <br>

        <footer class="text-center text-lg-start  text-muted">
          <!-- Section: Social media -->
          <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
              <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->
  
            <!-- Right -->
            <div>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
              </a>
            </div>
            <!-- Right -->
          </section>
          <!-- Section: Social media -->
  
          <!-- Section: Links  -->
          <section class="">
            <div class="container text-center text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>Simulasi PAK
                  </h6>
                  <p>
                    web ini merupakan web sederhana yang difungsikan untuk menghitung angka kredit
                    dosen yang akan melakukan kenaikan jabatan fungsional
                  </p>
                </div>
                <!-- Grid column -->
  
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    Products
                  </h6>
                  <p>
                    Pendidikan
                  </p>
                  <p>
                    Penelitian
                  </p>
                  <p>
                    Pengabdian Masyarakat
                  </p>
                  <p>
                    Dokumen Penunjang
                  </p>
                </div>
                <!-- Grid column -->
  
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    Useful links
                  </h6>
                  <p>
                    <a href="{{ route('userhome') }}" class="text-reset">Dashboard</a>
                  </p>
                  <p>
                    <a href="{{ route('boardpak') }}" class="text-reset">Perhitungan</a>
                  </p>
                </div>
                <!-- Grid column -->
  
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                  <p><i class="fas fa-home me-3"></i>IT DEL </p>
                  <p>
                    <i class="fas fa-envelope me-3"></i>
                    kelompok8pak@gmail.com
                  </p>
                  <p><i class="fas fa-phone me-3"></i>0822 7361 4832</p>
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row -->
            </div>
          </section>
          <!-- Section: Links  -->
  
          <!-- Copyright -->
          <div class="text-center p-4" >
          </div>
          <!-- Copyright -->
      </footer>





      
   
    
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




  </body>
</html>