@extends('.layouts.user')
@section('content1')

<br>
<br>
<br>
<br>

<div class="col-md-10 " > 
@foreach($user as $s)
    <div class="container">

        <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <img src="{{asset('profill')}}/{{ $s->foto }}" alt="..." class="img-thumbnail" width= "200">
            </div>
            <div class="col-sm-3">
                <!-- Tabel -->
                <table class="table table-borderless">
                <tbody>
                <tr><td><p style="font-size:110%; margin-bottom: -20px;">Nama</p></td></tr>
                <tr><td><p style="font-size:110%; margin-bottom: -5px;"><b>{{ $s->name}}</b></p></td></tr>

                <tr><td><p style="font-size:110%; margin-bottom: -20px;">Judul KUM</p></td></tr>
                <tr><td><p style="font-size:110%; margin-bottom: -5px;">
                            <b>
                                @if ($kumterakhir )
                                    {{ $kumterakhir->judul }}
                                @else
                                    -
                                @endif
                            </b>
                        </p>
                    </td>
                </tr>

                <tr><td><p style="font-size:110%; margin-bottom: -20px;"> Jabatan  Sekarang</p></td></tr>
                <tr>
                    <td>
                        <p style="font-size:110%; margin-bottom: -5px;">
                            <b>
                                @if ($kumterakhir )
                                    {{ $kumterakhir->jabatanSekarang->jabatan }}
                                @else
                                    -
                                @endif
                            </b>
                        </p>
                    </td>
                </tr>

                <tr><td><p style="font-size:110%; margin-bottom: -20px;"> Jabatan  Usulan</p></td></tr>
                <tr>
                    <td>
                        <p style="font-size:110%; margin-bottom: -20px;">
                            <b>
                                @if ( $kumterakhir)
                                    {{ $kumterakhir->jabatanDituju->jabatan }}
                                @else
                                    -
                                @endif
                            </b>  
                        </p>
                    </td>
                </tr>
                @php
                    $carbon = new \Carbon\Carbon;
                @endphp


                <tr><td><p style="font-size:110%; margin-bottom: -20px;">TMT</p></td></tr>
                <tr>
                    <td>
                        <p style="font-size:110%; margin-bottom: -5px;">
                            <b>
                                @if ($kumterakhir)
                                    {{ $carbon::parse($kumterakhir->tmt)->locale('id_ID')->isoFormat('D MMMM Y') }}
                                    hingga
                                    {{ $carbon::parse($kumterakhir->tmt_available)->locale('id_ID')->isoFormat('D MMMM Y') }}
                                @else
                                    -
                                @endif
                            </b>
                        </p>
                    </td>
                </tr>
                

                
                </tbody>
                </table>
                <!-- Tutup Tabel -->          
            </div>

            <div class="col-sm-4">
            
            <table class="table table-borderless">
                <tbody>
                    <tr>
                    <td>Pendidikan</td>
                    <td>
                        <div class="card" style="width: 4rem; height:2rem; ">
                        <center>
                        {{ $sumx }}
                        </center>
                        </div>
                    </td>
                    </tr>

                    <tr>
                    <td>Pelaksanaan Pendidikan</td>
                    <td>
                        <div class="card" style="width: 4rem; height:2rem; ">
                        <center>
                            {{ $sumpelaksanaanpendidikan }}
                        </center>
                        </div>
                    </td>
                    </tr>

                    <tr>
                    <td>Penelitian</td>
                    <td>
                        <div class="card" style="width: 4rem; height:2rem; ">
                        <center>
                            <?php echo number_format($sumpelaksanaanpenelitian, 2, '.', ','); ?>
                        </center>
                        </div>
                    </td>
                    </tr>

                    <tr>
                    <td>Pengabdian Kepada Masyarakat</td>
                    <td>
                        <div class="card" style="width: 4rem; height:2rem; ">
                        <center>
                            {{ $sumpelaksanaanpm }}
                        </center>
                        </div>
                    </td>
                    </tr>

                    <tr>
                    <td>Unsur Penunjang</td>
                    <td>
                        <div class="card" style="width: 4rem; height:2rem; ">
                        <center>
                            {{ $sumdp }}
                        </center>
                        </div>
                    </td>
                    </tr>

                </tbody>
            </table>

            </div>
        </div>
        </div>

    </div>
@endforeach
</div>



<!-- Coba -->



<br><br><br>
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
                    @foreach ($komponenpenelitian as $p)
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

      </div>






    
@endsection

@section('content2')
    
      <!--{ $komponenpak->links() }-->
      
    
@endsection