<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/universal.css') }}">

    <style>
      .sticky-nav {
        position: sticky;
        top: 0;
        z-index: 100;
      }
    </style>
    
    <title>
        @yield('title')
    </title>
        <!-- Custom fonts for this template-->
        <link href="{{URL::asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    
        <!-- Custom styles for this template-->
        <link href="{{URL::asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    @include('.layouts.navbar', ['containerClass' => 'col-md-10 mx-auto'])
  
       
        @yield('content1')
        <br>
        <div class="container" style="background-color: #F9F9FE">
        @yield('content2')
        </div>
        <br>
        <div class="" style="background-color: #3C8DBC">

            <footer class="text-center text-lg-start  text-muted " style="background-color:#3C8DBC ; margin-top:4pt">

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
        </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


      <script src="{{URL::asset('admin/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{URL::asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
      <!-- Core plugin JavaScript-->
      <script src="{{URL::asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  
      <!-- Custom scripts for all pages-->
      <script src="{{URL::asset('admin/js/sb-admin-2.min.js')}}"></script>
  
      <!-- Page level plugins -->
      <script src="{{URL::asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
  
      <!-- Page level custom scripts -->
      <script src="{{URL::asset('admin/js/demo/chart-area-demo.js')}}"></script>
      <script src="{{URL::asset('admin/js/demo/chart-pie-demo.js')}}"></script>
  </body>
</html>