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

  <div class="container">
    
  </div>
    <footer class="text-center pt-4 text-lg-start text-muted" style="background-color:#3C8DBC">

        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center pt-4">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 ">
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
              <div class="col-md-2 col-lg-2 col-xl-2 ">
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
              <div class="col-md-3 col-lg-2 col-xl-2 ">
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
              <div class="col-md-4 col-lg-3 col-xl-3">
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


  </body>
</html>