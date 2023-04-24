@extends('.layouts.user')

@section('content1')
    <div class="card rounded-3 text-black border-0 ">
      <div class="row g-0">
        <div class="col-lg-7">
            <div class="card-body p-md-8 mx-md-4">
                <form >
                    <div class="row my-2 no-gutters">
                        <div class="col">
                            <div class="card m-3" style="background-color: rgb(0, 51, 124, 0.3)">
                                <div class="card-body d-flex justify-content-between ">
                                    <button type="button" class="btn " style="background-color:white" >Button</button>
                                    <p class="card-text">Pendidikan dan Pengajaran</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card m-3" style="background-color: rgb(0, 51, 124, 0.3)">
                                <div class="card-body d-flex justify-content-between ">
                                    <button type="button" class="btn " style="background-color:white">Button</button>
                                    <p class="card-text">Penelitian</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2 no-gutters">
                        <div class="col">
                            <div class="card m-3" style="background-color: rgb(0, 51, 124, 0.3)">
                                <div class="card-body d-flex justify-content-between ">
                                    <button type="button" class="btn"style="background-color:white">Button</button>
                                    <p class="card-text">Pengabdian Masyarakat</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card m-3" style="background-color: rgb(0, 51, 124, 0.3)">
                                <div class="card-body d-flex justify-content-between ">
                                    <button type="button" class="btn"style="background-color:white">Button</button>
                                    <p class="card-text">Dokumen Penunjang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-lg-2 d-flex align-items-center ">
            <div class="card">
                <div class="card-body d-flex" id="cardprofil">
                  <img id="cardprofil-img" src="{{ asset('/aset_web/p1.png') }}" alt="Profile Picture" class="mr-3">
                  <div id="cardprofil-img">
                    <h5 class="card-title">Nama Pengguna</h5>
                    <p class="card-text">Deskripsi profil pengguna</p>
                  </div>
                </div>
            </div>
              
        </div>
        </div>
      </div>
    </div>


    
@endsection