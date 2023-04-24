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
                                    <button type="button" class="btn " style="background-color:white" ></button>
                                    <p class="card-text">Pendidikan dan Pengajaran</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card m-3" style="background-color: rgb(0, 51, 124, 0.3)">
                                <div class="card-body d-flex justify-content-between ">
                                    <button type="button" class="btn " style="background-color:white"></button>
                                    <p class="card-text">Penelitian</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2 no-gutters">
                        <div class="col">
                            <div class="card m-3" style="background-color: rgb(0, 51, 124, 0.3)">
                                <div class="card-body d-flex justify-content-between ">
                                    <button type="button" class="btn"style="background-color:white"></button>
                                    <p class="card-text">Pengabdian Masyarakat</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card m-3" style="background-color: rgb(0, 51, 124, 0.3)">
                                <div class="card-body d-flex justify-content-between ">
                                    <button type="button" class="btn"style="background-color:white"></button>
                                    <p class="card-text">Dokumen Penunjang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-lg-4 "  >
            <div class="card m-4">
                <div class="card-body d-flex" id="cardprofil">
                  <img id="cardprofil-img" src="{{ asset('/aset_web/p1.png') }}" alt="Profile Picture" class="mr-3">
                  <div class="d-flex"  >
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Nama</th>
                            <td>:</th>
                            <td>{{ Auth::user()->name }}</td>
                          </tr>
                          <tr>
                            <td>NIDN</td>
                            <td>:</td>
                            <td>11420084</td>
                          </tr>
                          <tr>
                            <td>Pangkat</td>
                            <td>:</td>
                            <td>Mahasiswa</td>
                          </tr>
                          <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td>Lektor</td>
                          </tr>
                          <tr>
                            <td>Fakultas/Jurusan</td>
                            <td>:</td>
                            <td>Teknologi Rekayasa Perangkat Lunak</td>
                          </tr>
                        </tbody>
                      </table>                   
                  </div>
                  <br>
                  
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>


    
@endsection