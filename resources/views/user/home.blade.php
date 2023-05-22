@extends('.layouts.user')

@section('content1')
    <div class="card rounded-3 text-black border-0 col-lg-10 mx-auto">
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
                <div class="card border-0 ">
                    <div class="card-body d-flex flex-column" id="cardprofil">
                    <img id="cardprofil-img" src="{{ asset('/aset_web/p1.png') }}" alt="Profile Picture" class="mr-3">
                    <div class="d-flex"  >
                        <table class="table table-responsive table-borderless">
                            <tbody>
                            <tr>
                                <td>Nama</th>
                                <td>:</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>NIDN</td>
                                <td>:</td>
                                <td>{{ Auth::user()->NIDN }}</td>
                            </tr>
                            <tr>
                                <td>Pangkat</td>
                                <td>:</td>
                                <td>{{ Auth::user()->Pangkat }}</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Fakultas/Jurusan</td>
                                <td>:</td>
                                <td>{{ Auth::user()->name }}</td>
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

    <h3><center>Komponen Penilaian Angka Kredit</center> </h3>
    <br>






    <div class="col-lg-11 mx-auto">
        <ul class="nav nav-underline flex justify-content-around mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pendidikan-tab" data-bs-toggle="tab" data-bs-target="#pendidikan-tab-pane" type="button" role="tab" aria-controls="pendidikan-tab-pane" aria-selected="true"><b>Pendidikan</b> </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pelaksanaanpendidikan-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpendidikan-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpendidikan-tab-pane" aria-selected="false"><b>Pelaksanaan Pendidikan</b>  </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pelaksanaanpenelitian-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpenelitian-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpenelitian-tab-pane" aria-selected="false"><b>Pelaksanaan Penelitian</b>  </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pelaksanaanpengabdian-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpengabdian-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpengabdian-tab-pane" aria-selected="false"><b>Pengabdian Kepada Masyarakat</b>  </button>
            </li> 
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="unsur-tab" data-bs-toggle="tab" data-bs-target="#unsur-tab-pane" type="button" role="tab" aria-controls="unsur-tab-pane" aria-selected="false"><b>Unsur Penunjang</b> </button>
            </li>
      </ul>

    </div>

      <br>
      <br>
    

      <div div class="tab-content mb-4 col-lg-10 mx-auto" id="myTabContent">


        <div class="tab-pane fade show active" id="pendidikan-tab-pane" role="tabpanel" aria-labelledby="pendidikan-tab" tabindex="0">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Komponen</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Batas Maksimal di Akui</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($strata_pendidikan as $x)
                        <tr>
                            <td>{{ $x->strata }}</td>
                            <td>{{ $x->keterangan }}</td>
                            <td>{{ $x->batas_maksimal_diakui }}</td>
                            <td>{{ $x->nilai }}</td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="tab-pane fade" id="pelaksanaanpendidikan-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpendidikan-tab" tabindex="0">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Komponen</th>
                    <th scope="col">Bukti Kegiatan</th>
                    <th scope="col">Batas Maksimal di Akui</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($jenis_pelaksanaan_pendidikan as $p)
                        <tr>
                            <td>{{ $p->jenispelaksanaan }}</td>
                            <td>{{ $p->bukti_kegiatan }}</td>
                            <td>{{ $p->batas_maksimal_diakui }}</td>
                            <td>{{ $p->angka_kredit }}</td>
                        </tr>                        
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="pelaksanaanpengabdian-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpengabdian-tab" tabindex="0">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Komponen</th>
                    <th scope="col">Bukti Kegiatan</th>
                    <th scope="col">Batas Maksimal di Akui</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($komponenpm as $p)
                        <tr>
                            <td>{{ $p->komponenkegiatan }}</td>
                            <td>{{ $p->bukti_kegiatan }}</td>
                            <td>{{ $p->batas_maksimal_diakui }}</td>
                            <td>{{ $p->angkakredit }}</td>
                        </tr>                        
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="unsur-tab-pane" role="tabpanel" aria-labelledby="unsur-tab" tabindex="0">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Komponen</th>
                    <th scope="col">Bukti Kegiatan</th>
                    <th scope="col">Batas Maksimal di Akui</th>
                    <th scope="col">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($komponendp as $p)
                        <tr>
                            <td>{{ $p->komponenkegiatan }}</td>
                            <td>{{ $p->bukti_kegiatan }}</td>
                            <td>{{ $p->batas_maksimal_diakui }}</td>
                            <td>{{ $p->angkakreditmax }}</td>
                        </tr>                        
                    @endforeach

                </tbody>
            </table>

        </div>

        <div class="tab-pane fade" id="pelaksanaanpenelitian-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpenelitian-tab" tabindex="0">
            
        </div>

      </div>






    
@endsection

@section('content2')
    
      <!--{ $komponenpak->links() }-->
      
    
@endsection