            <header>
                <div class="col-md-10 mx-auto mb-4">
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #3C8DBC; font-size: 20px; opacity: 0.8;">
                        <div class="container-fluid">
                        <a class="navbar-brand" href="#" style="font-size:24px"> <b>Simulasi</b>  PAK</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link"  href="{{ route('userhome') }}"> Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('boardpak') }}">Perhitungan </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Lampiran
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{ route('lampiranpendidikan') }}">Pendidikan</a></li>
                                  <li><a class="dropdown-item" href="{{ route('lampirandatapendidikan') }}">Pelaksanaan Pendidikan</a></li>
                                  <li><a class="dropdown-item" href="{{ route('datapenelitian') }}">Penelitian</a></li>
                                  <li><a class="dropdown-item" href="{{ route('datapm') }}">Pengabdian Masyarakat</a></li>
                                  <li><a class="dropdown-item" href="{{ route('datapenunjang') }}">Penunjang</a></li>
                                </ul>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('lampiran-all') }}">Lampiran </a>
                            </li> --}}
                            </ul>
                            <ul class="navbar-nav ms-auto ">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }} &nabla;</span>
                                    {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profil') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Data Diri
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Keluar
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                          </form>
                                    </a>
                                </div>
                            </li>
                            </ul>


                    
                        </div>
                        </div>
                        </div>
                    </nav>
                </div >                    
            </header>
            


            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Tekan Button Logout jika anda yakin </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>