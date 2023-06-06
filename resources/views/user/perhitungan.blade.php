@extends('.layouts.user')
@section('content1')

<br>
<br>
<br>
<br>


  <div class="col-lg-10 mx-auto">
    <div class="row">
      <div class="col-md">
        <div class="jumbotron d-flex" > 
          <div class="">
              <h3>Hi,{{ Auth::user()->name }}</h3>
              <p style="">Kelola Data Kamu Disini</p>
          </div>
          <div class="ms-auto" style="background-image: url('{{ asset('aset_web/p1.png') }}')">
          </div>
        </div>
      </div>
      

      @php  
          $kum1 = $kum->jabatanSekarang->angkaKreditKumulatif;
          $kum2 = $kum->jabatanDituju->angkaKreditKumulatif;

          $jabatandituju = $kum->jabatanDituju->jabatan;
          $operasikum = intval($kum2) - intval($kum1);
          if($jabatandituju == 'Asisten Ahli 100' ){
            $angkakreditpelaksanaanPendidikannmax = (intval($kum->jabatanDituju->pelaksanaanPendidikan) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPenelitianmax = (intval($kum->jabatanDituju->pelaksanaanPenelitian) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPengabdianMasyarakatmax = (intval($kum->jabatanDituju->pelaksanaanPengabdianMasyarakat) / 100) * intval($operasikum);
            $angkakreditpenunjangmax = (intval($kum->jabatanDituju->penunjang) / 100) * intval($operasikum);

          }elseif ($jabatandituju == 'Asisten Ahli 150') {
            $angkakreditpelaksanaanPendidikannmax = (intval($kum->jabatanDituju->pelaksanaanPendidikan) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPenelitianmax = (intval($kum->jabatanDituju->pelaksanaanPenelitian) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPengabdianMasyarakatmax = (intval($kum->jabatanDituju->pelaksanaanPengabdianMasyarakat) / 100) * intval($operasikum);
            $angkakreditpenunjangmax = (intval($kum->jabatanDituju->penunjang) / 100) * intval($operasikum);

          }elseif ($jabatandituju == 'Lektor 200') {
            $angkakreditpelaksanaanPendidikannmax = (intval($kum->jabatanDituju->pelaksanaanPendidikan) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPenelitianmax = (intval($kum->jabatanDituju->pelaksanaanPenelitian) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPengabdianMasyarakatmax = (intval($kum->jabatanDituju->pelaksanaanPengabdianMasyarakat) / 100) * intval($operasikum);
            $angkakreditpenunjangmax = (intval($kum->jabatanDituju->penunjang) / 100) * intval($operasikum);

          }elseif ($jabatandituju == 'Lektor 300') {
            $angkakreditpelaksanaanPendidikannmax = (intval($kum->jabatanDituju->pelaksanaanPendidikan) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPenelitianmax = (intval($kum->jabatanDituju->pelaksanaanPenelitian) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPengabdianMasyarakatmax = (intval($kum->jabatanDituju->pelaksanaanPengabdianMasyarakat) / 100) * intval($operasikum);
            $angkakreditpenunjangmax = (intval($kum->jabatanDituju->penunjang) / 100) * intval($operasikum);

          }elseif ($jabatandituju == 'Lektor Kepala 400') {
            $angkakreditpelaksanaanPendidikannmax = (intval($kum->jabatanDituju->pelaksanaanPendidikan) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPenelitianmax = (intval($kum->jabatanDituju->pelaksanaanPenelitian) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPengabdianMasyarakatmax = (intval($kum->jabatanDituju->pelaksanaanPengabdianMasyarakat) / 100) * intval($operasikum);
            $angkakreditpenunjangmax = (intval($kum->jabatanDituju->penunjang) / 100) * intval($operasikum);

          }elseif ($jabatandituju == 'Lektor Kepala 550') {
            $angkakreditpelaksanaanPendidikannmax = (intval($kum->jabatanDituju->pelaksanaanPendidikan) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPenelitianmax = (intval($kum->jabatanDituju->pelaksanaanPenelitian) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPengabdianMasyarakatmax = (intval($kum->jabatanDituju->pelaksanaanPengabdianMasyarakat) / 100) * intval($operasikum);
            $angkakreditpenunjangmax = (intval($kum->jabatanDituju->penunjang) / 100) * intval($operasikum);
            
          }elseif ($jabatandituju == 'Lektor Kepala 700') {
            $angkakreditpelaksanaanPendidikannmax = (intval($kum->jabatanDituju->pelaksanaanPendidikan) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPenelitianmax = (intval($kum->jabatanDituju->pelaksanaanPenelitian) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPengabdianMasyarakatmax = (intval($kum->jabatanDituju->pelaksanaanPengabdianMasyarakat) / 100) * intval($operasikum);
            $angkakreditpenunjangmax = (intval($kum->jabatanDituju->penunjang) / 100) * intval($operasikum);
            echo $angkakreditpelaksanaanPengabdianMasyarakatmax;
          }elseif ($jabatandituju == 'Professor 850') {
            $angkakreditpelaksanaanPendidikannmax = (intval($kum->jabatanDituju->pelaksanaanPendidikan) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPenelitianmax = (intval($kum->jabatanDituju->pelaksanaanPenelitian) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPengabdianMasyarakatmax = (intval($kum->jabatanDituju->pelaksanaanPengabdianMasyarakat) / 100) * intval($operasikum);
            $angkakreditpenunjangmax = (intval($kum->jabatanDituju->penunjang) / 100) * intval($operasikum);
          }elseif ($jabatandituju == 'Professor 1050') {
            $angkakreditpelaksanaanPendidikannmax = (intval($kum->jabatanDituju->pelaksanaanPendidikan) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPenelitianmax = (intval($kum->jabatanDituju->pelaksanaanPenelitian) / 100) * intval($operasikum);
            $angkakreditpelaksanaanPengabdianMasyarakatmax = (intval($kum->jabatanDituju->pelaksanaanPengabdianMasyarakat) / 100) * intval($operasikum);
            $angkakreditpenunjangmax = (intval($kum->jabatanDituju->penunjang) / 100) * intval($operasikum);
          }else{
            echo "NaN";
          }

          $persentasepelaksanaanpendidikan = number_format($sumpelaksanaanpendidikan / $angkakreditpelaksanaanPendidikannmax * 100, 2);
          $persentasepelaksanaanpenelitian = number_format($sumpelaksanaanpenelitian / $angkakreditpelaksanaanPenelitianmax * 100, 2);
          $persentasepm = number_format($sumpelaksanaanpm / $angkakreditpelaksanaanPengabdianMasyarakatmax * 100, 2);
          $persentasedp = number_format($sumdp / $angkakreditpenunjangmax * 100, 2);


          //pendidikan//

          if($jabatandituju == 'Asisten Ahli 100' ){
            if($poinpendidikan == null || $poinpendidikan == 0 || $poinpendidikan < 150){
            $poin = 0;
            }else{
            $poin = 100;
            }
          }elseif ($jabatandituju == 'Asisten Ahli 150') {
            if($poinpendidikan == null || $poinpendidikan == 0 || $poinpendidikan < 150){
            $poin = 0;
            }else{
            $poin = 100;
            }
          }elseif ($jabatandituju == 'Lektor 200') {
            if($poinpendidikan == null || $poinpendidikan == 0 || $poinpendidikan < 150){
            $poin = 0;
            }else{
            $poin = 100;
            }
          }elseif ($jabatandituju == 'Lektor 300') {
            if($poinpendidikan == null || $poinpendidikan == 0 || $poinpendidikan < 150){
            $poin = 0;
            }else{
            $poin = 100;
            }

          }elseif ($jabatandituju == 'Lektor Kepala 400') {
            if($poinpendidikan == null || $poinpendidikan == 0 || $poinpendidikan < 150){
            $poin = 0;
            }else{
            $poin = 100;
            }

          }elseif ($jabatandituju == 'Lektor Kepala 550') {
            if($poinpendidikan == null || $poinpendidikan == 0 || $poinpendidikan < 150){
            $poin = 0;
            }else{
            $poin = 100;
            }
            
          }elseif ($jabatandituju == 'Lektor Kepala 700') {
            if($poinpendidikan == null || $poinpendidikan == 0 || $poinpendidikan < 150){
            $poin = 0;
            }else{
            $poin = 100;
            }
          }elseif ($jabatandituju == 'Professor 850') {
            if($poinpendidikan == null || $poinpendidikan == 0 || $poinpendidikan < 200){
            $poin = 0;
            }else{
            $poin = 100;
            }
          }elseif ($jabatandituju == 'Professor 1050') {
            if($poinpendidikan == null || $poinpendidikan == 0 || $poinpendidikan < 200){
            $poin = 0;
            }else{
            $poin = 100;
            }
          }else{
          }
      @endphp

            <!-- Modal -->
      <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="alertModalLabel">Pemberitahuan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Total SKS melebihi batas maksimum (12) untuk id_semester dan id_kum yang sama.</p>
            </div>
          </div>
        </div>
      </div>



      <div class="col-md">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Progres Pengerjaan KUM</h6>
          </div>
          <div class="card-body">
              <h4 class="small font-weight">Pendidikan<span
                      class="float-right"></span></h4>
              <div class="progress mb-4">
                  <div class="progress-bar bg-success" role="progressbar" style="width: {{ $poin }}%"
                      aria-valuenow="{{ $poin }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight">Pelaksanaan Pendidikan<span
                class="float-right">{{ $sumpelaksanaanpendidikan }} / {{ $angkakreditpelaksanaanPendidikannmax }}</span>
              </h4>
              <div class="progress mb-4">
                  @if ($persentasepelaksanaanpendidikan >= 100)
                      <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persentasepelaksanaanpendidikan }}%"
                          aria-valuenow="{{ $persentasepelaksanaanpendidikan }} %" aria-valuemin="0" aria-valuemax="100">
                      </div>
                  @else
                      <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $persentasepelaksanaanpendidikan }}%"
                          aria-valuenow="{{ $persentasepelaksanaanpendidikan }} %" aria-valuemin="0" aria-valuemax="100">
                      </div>
                  @endif
              </div>
        
              <h4 class="small font-weight">Pelaksanaan Penelitian   <span
                      class="float-right">{{ number_format($sumpelaksanaanpenelitian, 2) }} / {{ $angkakreditpelaksanaanPenelitianmax }}</span></h4>
              @if($persentasepelaksanaanpenelitian >= 100)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persentasepelaksanaanpenelitian }}%"
                        aria-valuenow="{{ $persentasepelaksanaanpenelitian }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              @else
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $persentasepelaksanaanpenelitian }}%"
                        aria-valuenow="{{ $persentasepelaksanaanpenelitian }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              @endif


              <h4 class="small font-weight">Pengabdian Kepada Masyarakat   <span
                      class="float-right">{{ $sumpelaksanaanpm }} / {{ $angkakreditpelaksanaanPengabdianMasyarakatmax }}</span></h4>
              @if($persentasepm >= 100)
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persentasepm }}%"
                        aria-valuenow="{{ $persentasepm }} %" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              @else
              <div class="progress mb-4">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $persentasepm }}%"
                      aria-valuenow="{{ $persentasepm }} %" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              @endif
              

              <h4 class="small font-weight">Dokumen Penunjang   <span
                      class="float-right">{{ $sumdp }} / {{ $angkakreditpenunjangmax }}</span></h4>
              @if($persentasedp >= 100)
              <div class="progress">  
                  <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persentasedp }}%"
                      aria-valuenow="{{ $persentasedp }} %" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              @else
              <div class="progress">  
                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $persentasedp }}%"
                    aria-valuenow="{{ $persentasedp }} %" aria-valuemin="0" aria-valuemax="100"></div>
              </div>    
              @endif          
          </div>
        </div>
      </div>

    </div>

    <script>
      $(document).ready(function(){
        // saat tombol dengan class 'btn' di klik
        $('.btn').click(function(){
          // menutup semua collapse yang ada di dalam class 'collapse-container'
          $('.collapse-container').find('.collapse').collapse('hide');
        });
      }); 
    </script>

    <ul class="nav nav-underline flex justify-content-around mt-3" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pendidikan-tab" data-bs-toggle="tab" data-bs-target="#pendidikan-tab-pane" type="button" role="tab" aria-controls="pendidikan-tab-pane" aria-selected="true">Pendidikan</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pelaksanaanpendidikan-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpendidikan-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpendidikan-tab-pane" aria-selected="false">Pelaksanaan Pendidikan</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pelaksanaanpenelitian-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpenelitian-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpenelitian-tab-pane" aria-selected="false">Pelaksanaan Penelitian</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pelaksanaanpengabdian-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpengabdian-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpengabdian-tab-pane" aria-selected="false">Pengabdian Kepada Masyarakat</button>
          </li> 
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="unsur-tab" data-bs-toggle="tab" data-bs-target="#unsur-tab-pane" type="button" role="tab" aria-controls="unsur-tab-pane" aria-selected="false">Unsur Penunjang</button>
          </li>
    </ul>
  </div>

      <div class="tab-content mb-4" id="myTabContent">
        {{-- . Unsur Pendidikan  --}}   
             
        <div class="tab-pane fade show active" id="pendidikan-tab-pane" role="tabpanel" aria-labelledby="pendidikan-tab" tabindex="0">
          <div class="col-lg-10 mx-auto" style="margin-top: 30px">

              <form method="POST" action="{{ route('pendidikan.store', $kum->id) }}" enctype="multipart/form-data">
                @csrf
                <div id="inputFieldpendidikan" class = "inputFieldpendidikan" >
                  <div class="input-group-pendidikan ">
                    <div class="col-lg-10 ">
                      <div class="d-flex">
                        <div class="flex-grow-1">
                          <h3><b>Input Data Pendidikan</b></h3>
                          <a href="{{ route('pendidikan-tampilan',$kum->id) }}" class="btn btn-info">Lihat</a>     
                        </div>

                      </div>
                    </div>
                    <br>
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Melaksanakan Perkuliahan dan Membimbing </h6>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md m-3">
                                <label for="institusi">Institusi Pendidikan</label>
                                <input type="text" class="form-control"  name="inputs[0][institusi]">
                            </div>
                        </div>

                        <div class="form-group ">
                          <div class="col-md m-3">
                            <label for="stratapendidikan">Strata Pendidikan</label>
                            <select class="form-control"  name="inputs[0][strata_id]">
                                <option>Pilih Tingkat Strata Pendidikan</option>
                                @foreach ($strata_pendidikan as $p)
                                    <option class="" value="{{$p->id}}" data-kum ="{{$p->nilai}}" title="{{$p->strata}}">{{Str::limit($p->strata,100)}}</option>
                                @endforeach
                            </select>
                          </div>
        
                        </div>

                        <div>
                          <input hidden type="text" value="{{ $kum->id }}"  name="inputs[0][kum_id]">
                        </div>
                
                        <div class="form-group row">
                            <div class="col-md m-3">
                                <label for="tanggal">Tanggal Kelulusan</label>
                                <input type="date" class="form-control"  name="inputs[0][tanggal]">
                            </div>
                            <div class="col-md m-3">
                              <label for="bukti">Bukti</label>
                              <input class="form-control @error('bukti') is-invalid @enderror" type="file"  name="inputs[0][bukti]">
                              @error('bukti')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                              @enderror
                            </div>
                        </div>
                
                        
                        
                          <hr>
                          Pengumpulan informasi tentang tingkat pendidikan individu dalam format yang terstruktur, untuk keperluan analisis
                      </div>
                    </div>                    
                  </div>
                </div>
                <button id="addButton-pendidikan" class="btn btn-primary" type="button">Tambah</button>
                <button class="btn btn-success" type="submit">Kirim</button>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
                <script>
                  var i = 0 ;    
                  var z = 0;      
                    $(document).ready(function() {
                      ++i;
    
    
                        // Add new field
    
                        $('#addButton-pendidikan').click(function() {
                            var fieldHTML =
                            '<div id="inputFieldpendidikan"  class = "inputFieldpendidikan">'+
                              '<div class="input-group-pendidikan ">'+
                                '<div class="card shadow mb-4">'+
                                      '<div class="card-header py-3">'+
                                          '<div class="d-flex">'+
                                            '<div class="card-header flex-grow-1 py-3 ">'+
                                              '<h6 class="m-0 font-weight-bold text-primary">Melaksanakan Perkuliahan dan Membimbing </h6>'+
                                            '</div>'+
                                            '<div class="input-group-append">'+
                                              '<button class="btn btn-outline-secondary remove-field" type="button">&times;</button>'+
                                            '</div>'+
                                          '</div>'+
                                      '</div>'+
                                      '<div class="card-body">'+
                                        '<div class="form-group row">'+
                                            '<div class="col-md m-3">'+
                                                '<label for="institusi">Institusi Pendidikan</label>'+
                                                '<input type="text" class="form-control" name="inputs['+i+'][institusi]">'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group ">'+
                                          '<div class="col-md m-3">'+
                                            '<label for="stratapendidikan">Strata Pendidikan</label>'+
                                            '<select class="form-control"  name="inputs['+i+'][strata_id]">'+
                                                '<option>Pilih Tingkat Strata Pendidikan</option>'+
                                                '@foreach ($strata_pendidikan as $p)'+
                                                    '<option class="" value="{{$p->id}}" data-kum ="{{$p->nilai}}" title="{{$p->strata}}">{{Str::limit($p->strata,100)}}</option>'+
                                                '@endforeach'+
                                            '</select>'+
                                          '</div>'+
                        
                                        '</div>'+

                                        '<div>'+
                                          '<input hidden type="text" value="{{ $kum->id }}"  name="inputs['+i+'][kum_id]">'+
                                        '</div>'+
                                
                                        '<div class="form-group row">'+
                                            '<div class="col-md m-3">'+
                                                '<label for="tanggal">Tanggal Kelulusan</label>'+
                                                '<input type="date" class="form-control"  name="inputs['+i+'][tanggal]">'+
                                            '</div>'+
                                
                                            '<div class="col-md m-3">'+
                                              '<label for="bukti">Bukti</label>'+
                                              '<input class="form-control @error('bukti') is-invalid @enderror" type="file"  name="inputs['+i+'][bukti]">'+
                                              '@error('bukti')'+
                                                  '<div class="invalid-feedback">'+
                                                      '{{$message}}'+
                                                  '</div>'+
                                              '@enderror'+
                                            '</div>'+                              

                                        '</div>'+
                                          '<hr>'+
                                          'Pengumpulan informasi tentang tingkat pendidikan individu dalam format yang terstruktur, untuk keperluan analisis'+
                                      '</div>'+
    

                                '</div>'+           
                              '</div>'+
                            '</div>'
    
    
                          $('#inputFieldpendidikan').append(fieldHTML);
    
                        });
                        // Remove field
                        $(document).on('click', '.remove-field', function() {
                            $(this).closest('.input-group-pendidikan').remove();
                        });
                    });              
                </script>
              </form>
          </div>
    
        </div>
        {{-- . Unsur Pelaksanaan Pendidikan  --}}
        <div class="tab-pane fade" id="pelaksanaanpendidikan-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpendidikan-tab" tabindex="0">
          <div class="col-lg-10 mx-auto" style="margin-top: 30px">
            <form action="{{ route('pengajaran.store') }}" method="POST"  enctype="multipart/form-data"id="myForm" >
              @csrf
                <div id="inputFields" class = "inputFields" >
                    <div class="input-group ">
                      <div class="col-lg-10 ">
                        <div class="d-flex">
                          <div class="flex-grow-1">
                            <h3><b>Input Data Pengajaran</b></h3>
                            <a href="{{ route('unsurpelaksanaan.show',$kum->id) }}" class="btn btn-info">Lihat</a> 
                          </div>
                        </div>
                        <br>
                      </div>

                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Melaksanakan Perkuliahan</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                              <div class="col-md m-3">
                                  <label for="instansi">Instansi</label>
                                  <input type="text" class="form-control" name="inputs[0][instansi]">
                              </div>       
                              
                              <div class="col-md m-3">
                                <label for="semester">Semester</label>
                                <select class="form-control"  name="inputs[0][id_semester]">
                                    <option>Pilih Semester</option>
                                    @foreach ($semester as $s)
                                        <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                                    @endforeach
                                </select>
                              </div>

                            </div>
                            <div class="form-group row">
                              <div class="col-md m-3">
                                  <label for="kode_matakuliah">Kode Matakuliah</label>
                                  <input type="text" class="form-control" name="inputs[0][kode_matakuliah]">
                              </div>

                              <div class="col-md m-3">
                                <label for="matakuliah">Nama Mata Kuliah</label>
                                <input type="text" class="form-control"  name="inputs[0][matakuliah]">
                              </div>
                            </div>
                  
                            <div class="form-group row">
                                <div class="col-md m-3">
                                  <label for="nama_kelas_pengajaran">Nama Kelas</label>
                                  <input type="text" class="form-control"  name="inputs[0][nama_kelas_pengajaran]">
                                </div>

                                <div class="col-md m-3">
                                    <label for="volume_dosen_pengajar">Volume Dosen</label>
                                    <input  type="number" class="form-control x"  name="inputs[0][volume_dosen_pengajar]" onkeyup="sum1()" >
                                </div>

                                <div class="col-md m-3">
                                        <label for="sks_pengajaran">SKS</label>
                                        <input  type="number" class="form-control x"  name="inputs[0][sks_pengajaran]" onkeyup="perkalian()">
                                </div>     
                                
                            </div>

                            <div class="form-group row">
                              <div class="col-md m-3 ">
                                <label for="file">Bukti</label>
                                <input class="form-control @error('file') is-invalid @enderror" type="file" name="inputs[0][file]" >
                                @error('file')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                              </div>
                            </div>

                            <div>
                              <input hidden type="text" value="{{ $kum->id }}"  name="inputs[0][id_kum]">
                            </div>

                            <hr>
                            Input Data Pengajaran adalah kumpulan informasi yang diberikan atau dimasukkan ke dalam suatu sistem atau proses untuk keperluan perhitungan angka kredit aktifitas pengajaran. Data ini berisi instansi,semester, kode mataa kuliah, nama mata kuliah, nama kelas, volume dosen, sks dan file yang digunakan sebagai acuan dalam mengelola angka kredit dosen.
                          </div>
                      </div>                    
                    </div>
                </div>
                <button id="addButton" class="btn btn-primary" type="button">Tambah</button>
                <button class="btn btn-success" type="submit">Kirim</button>
            </form>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                  var i = 0 ;              
              $(document).ready(function() {
                ++i;

                  // Add new field

                  $('#addButton').click(function() {
                      var fieldHTML =
                      '<div id="inputFields"  class = "inputFields">'+
                        '<div class="input-group ">'+

                          '<div class="card shadow mb-4">'+
                                '<div class="card-header py-3">'+
                                    '<div class="d-flex">'+
                                      '<div class="card-header flex-grow-1 py-3 ">'+
                                        '<h6 class="m-0 font-weight-bold text-primary">Melaksanakan Perkuliahan dan Membimbing </h6>'+
                                      '</div>'+
                                      '<div class="input-group-append">'+
                                        '<button class="btn btn-outline-secondary remove-field" type="button">&times;</button>'+
                                      '</div>'+
                                    '</div>'+
                                '</div>'+
                            '<div class="card-body">'+

                              '<div class="form-group row">' +
                                '<div class="col-md m-3">' +
                                  ' <label for="instansi">Instansi</label>' +
                                  '<input type="text" class="form-control" id="instansi" name="inputs['+i+'][instansi]">' +
                                '</div>' +       
                                
                                '<div class="col-md m-3">' +
                                  '<label for="semester">Semester</label>' +
                                  ' <select class="form-control" id="id_semester" name="inputs['+i+'][id_semester]">' +
                                      '<option>Pilih Semester</option>' +
                                      '@foreach ($semester as $s)'+
                                          '<option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>' +
                                      '@endforeach'+
                                  '</select>' +
                                '</div>' +
                              '</div>' +

                              '<div class="form-group row">' +
                                '<div class="col-md m-3">' +
                                    '<label for="kode_matakuliah">kode_matakuliah</label>' +
                                    '<input type="text" class="form-control"  name="inputs['+i+'][kode_matakuliah]">' +
                                '</div>' +

                                '<div class="col-md m-3">' +
                                  '<label for="matakuliah">Nama Mata Kuliah</label>' +
                                  '<input type="text" class="form-control"  name="inputs['+i+'][matakuliah]">' +
                                '</div>' +
                              '</div>' +


                              '<div class="form-group row">' +
                                  '<div class="col-md m-3">' +
                                    '<label for="nama_kelas_pengajaran">Nama Kelas</label>' +
                                    '<input type="text" class="form-control"  name="inputs['+i+'][nama_kelas_pengajaran]">' +
                                  '</div>' +

                                  '<div class="col-md m-3">' +
                                      '<label for="volume_dosen_pengajar">Volume Dosen</label>' +
                                      '<input  type="number" class="form-control x"  name="inputs['+i+'][volume_dosen_pengajar]" onkeyup="sum()" >' +
                                  '</div>' +

                                  '<div class="col-md m-3">' +
                                          '<label for="sks">SKS</label>' +
                                          '<input  type="number" class="form-control x"  name="inputs['+i+'][sks_pengajaran]" onkeyup="sum()">' +
                                  '</div>' +       
                                                              
                              '</div>' +

                              '<div>' +
                                '<input hidden type="text" value="{{ $kum->id }}"  name="inputs['+i+'][id_kum]">' +
                              '</div>' +

                              '<div class="form-group row">'+
                                '<div class="col-md ">'+
                                  '<label for="file">Bukti</label>'+
                                  '<input class="form-control @error('file') is-invalid @enderror" type="file" name="inputs[0][file]" >'+
                                  '@error('file')'+
                                      '<div class="invalid-feedback">'+
                                          '{{$message}}'+
                                      '</div>'+
                                  '@enderror'+
                                '</div>'+
                              '</div>'+


                              '<hr>' +
                              'Input Data Pengajaran adalah kumpulan informasi yang diberikan atau dimasukkan ke dalam suatu sistem atau proses untuk keperluan perhitungan angka kredit aktifitas pengajaran. Data ini berisi instansi,semester, kode mataa kuliah, nama mata kuliah, nama kelas, volume dosen, sks dan file yang digunakan sebagai acuan dalam mengelola angka kredit dosen'+
                            '</div>'+
                          '</div>'+           
                        '</div>'+
                      '</div>'


                    $('#inputFields').append(fieldHTML);

                  });
                  // Remove field
                  $(document).on('click', '.remove-field', function() {
                      $(this).closest('.input-group').remove();
                  });
              });
            </script>

            <br>     
            <br>
          </div>

          <hr class="sidebar-divider">
          <hr class="sidebar-divider">


            {{-- pengajaran --}}
            <div class="col-md-12" style="background-color: #F9F9FE">
              <div class="col-lg-10 mx-auto" style="margin-top: 30px">
                <div class="" >
                  <form  action="{{ route('unsurpelaksanaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="inputFieldpelaksanaan" class = "inputFieldpelaksanaan" >
                      <div class="input-group ">
                        <div class="col-lg-10 ">
                          <div class="d-flex">
                            <div class="flex-grow-1">
                              <h3><b>Input Data Pelaksanaan Pendidikan</b></h3>
                            </div>
                          </div>
                        </div>
                        <div class="card shadow mb-4">
                          <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Melaksanakan Perkuliahan dan Membimbing </h6>
                          </div>
                          <div class="card-body">
    
                              <div class="form-group row">
                                <div class="col-md m-3">
                                    <label for="tempat_instansi">Instansi</label>
                                    <input type="text" class="form-control" id="tempat_instansi" name="inputs[0][tempat_instansi]">
                                </div>       
                                
                                <div class="col-md m-3">
                                  <label for="semester">Semester</label>
                                  <select class="form-control" id="semester_id" name="inputs[0][semester_id]">
                                      <option>Pilih Semester</option>
                                      @foreach ($semester as $s)
                                          <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                                      @endforeach
                                  </select>
                                </div>
    
                              </div>
    
                              <div class="form-group row">
                                <div class="col-md m-3">
                                  <label for="semester">Jenis Pelaksanaan</label>
                                  <select class="form-control idjenispelaksanaan" id="idjenispelaksanaan" name="inputs[0][idjenispelaksanaan]">
                                      <option>Pilih Jenis Pelaksanaan</option>
                                      @foreach ($jenis_pelaksanaan_pendidikan as $j)
                                          <option class="" value="{{$j->id}}" title="{{$j->jenispelaksanaan}}" angka-kredit = "{{ $j->angka_kredit }}">{{Str::limit($j->jenispelaksanaan,100)}}</option>
                                      @endforeach
                                  </select>
                                </div>
    
                              </div>
                              
                    
                              <div class="form-group row">
                                  <div class="col-md m-3">
                                    <label for="nama_kegiatan">Nama Kegiatan</label>
                                    <input type="text" class="form-control" id="nama_kegiatan" name="inputs[0][nama_kegiatan]">
                                  </div>
    
                                  <div class="col-md m-3">
                                      <label for="bukti">Bukti</label>
                                      <input class="form-control @error('bukti_pendidikan') is-invalid @enderror" type="file"  name="inputs[0][bukti_pendidikan]">
                                      @error('bukti_pendidikan')
                                          <div class="invalid-feedback">
                                              {{$message}}
                                          </div>
                                      @enderror
                    
                                  </div>
    
                                  
                              </div>
                              <div>
                                <input hidden type="text" value="{{ $kum->id }}" name="inputs[0][id_kum]">
                              </div>
    
                              <hr>
                              Melaksanakan perkuliahan Tutorial dan membimbing, Menguji serta menyelenggarakan pendidikan di laboratorium, praktek perguruan bengkel/studio, kebun percobaan, teknologi pengajaran dan praktek lapangan
                          </div>
                        </div>                    
                      </div>
                    </div>
                    <button id="addButton-pelaksanaan" class="btn btn-primary" type="button">Tambah</button>
                    <button class="btn btn-success" type="submit">Kirim</button>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
                    <script>
                      var i = 0 ;    
                      var z = 0;      
                        $(document).ready(function() {
                          ++i;
      
      
                            // Add new field
      
                            $('#addButton-pelaksanaan').click(function() {
                                var fieldHTML =
                                '<div id="inputFieldpelaksanaan"  class = "inputFieldpelaksanaan">'+
                                  '<div class="input-group-pelaksanaan ">'+
      
                                    '<div class="card shadow mb-4">'+
                                          '<div class="card-header py-3">'+
                                              '<div class="d-flex">'+
                                                '<div class="card-header flex-grow-1 py-3 ">'+
                                                  '<h6 class="m-0 font-weight-bold text-primary">Melaksanakan Perkuliahan dan Membimbing </h6>'+
                                                '</div>'+
                                                '<div class="input-group-append">'+
                                                  '<button class="btn btn-outline-secondary remove-field" type="button">&times;</button>'+
                                                '</div>'+
                                              '</div>'+
                                          '</div>'+
      
                                          '<div class="card-body">'+
      
                                            '<div class="form-group row">'+
                                              '<div class="col-md m-3">'+
                                                  '<label for="tempat_instansi">Instansi</label>'+
                                                  '<input type="text" class="form-control"  name="inputs['+i+'][tempat_instansi]">'+
                                              '</div>'+       
                                              
                                              '<div class="col-md m-3">'+
                                                '<label for="semester">Semester</label>'+
                                                '<select class="form-control" id="semester_id" name="inputs['+i+'][semester_id]">'+
                                                    '<option>Pilih Semester</option>'+
                                                    '@foreach ($semester as $s)'+
                                                        '<option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>'+
                                                    '@endforeach'+
                                                '</select>'+
                                              '</div>'+
      
                                            '</div>'+
      
                                            '<div class="form-group row">'+
                                              '<div class="col-md m-3">'+
                                                '<label for="semester">Jenis Pelaksanaan</label>'+
                                                '<select class="form-control idjenispelaksanaan" id="idjenispelaksanaan" name="inputs['+i+'][idjenispelaksanaan]">'+
                                                    '<option>Pilih Jenis Pelaksanaan</option>'+
                                                    '@foreach ($jenis_pelaksanaan_pendidikan as $j)'+
                                                        '<option class="" value="{{$j->id}}" title="{{$j->jenispelaksanaan}}" angka-kredit = "{{ $j->angka_kredit }}">{{Str::limit($j->jenispelaksanaan,100)}}</option>'+
                                                    '@endforeach'+
                                                '</select>'+
                                              '</div>'+
      
                                            '</div>'+
      
      
                                            '<div class="form-group row">'+
                                                '<div class="col-md m-3">'+
                                                  '<label for="nama_kegiatan">Nama Kegiatan</label>'+
                                                  '<input type="text" class="form-control" id="nama_kegiatan" name="inputs['+i+'][nama_kegiatan]">'+
                                                '</div>'+
      
                                                '<div class="col-md m-3">'+
                                                    '<label for="bukti_pendidikan"></label>'+
                                                    '<input class="form-control @error('bukti_pendidikan') is-invalid @enderror" type="file"  name="inputs['+i+'][bukti_pendidikan]">'+
                                                    '@error('bukti_pendidikan')'+
                                                        '<div class="invalid-feedback">'+
                                                            '{{$message}}'+
                                                        '</div>'+
                                                    '@enderror' +
                                  
                                                '</div>'+
      
                                                
                                            '</div>'+
                                            '<div>'+
                                              '<input hidden type="text" value="{{ $kum->id }}" id="id_kum" name="inputs['+i+'][id_kum]">'+
                                            '</div>'+
      
                                            '<hr>'+
                                            'Melaksanakan perkuliahan Tutorial dan membimbing, Menguji serta menyelenggarakan pendidikan di laboratorium, praktek perguruan bengkel/studio, kebun percobaan, teknologi pengajaran dan praktek lapangan' +
                                          '</div>'+
                                    '</div>'+           
                                  '</div>'+
                                '</div>'
      
      
                              $('#inputFieldpelaksanaan').append(fieldHTML);
      
                            });
                            // Remove field
                            $(document).on('click', '.remove-field', function() {
                                $(this).closest('.input-group-pelaksanaan').remove();
                            });
                        });              
                    </script>
                  </form>
                </div>
              </div>
            </div>
        </div>

        {{-- . Unsur Pelaksanaan Pengabdian Masyarakat  --}}
        <div class="tab-pane fade" id="pelaksanaanpengabdian-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpengabdian-tab" tabindex="0">
          
          <div class="col-lg-10 mx-auto" style="margin-top: 30px">
 
            <form method="POST" action="{{ route('pelaksanaan_pm.store', $kum->id) }}" enctype="multipart/form-data">
              @csrf
              <div id="inputFieldpm" class = "inputFieldpm" >
                <div class="input-group-pm ">
                  <div class="col-lg-10 ">
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <h3><b>Input Data Pengabdian Kepada Masyarakat</b></h3>
                        <br>
                        <a href="{{ route('pelaksanaan_pm.show',$kum->id) }}" class="btn btn-info">Lihat</a>    

                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Melaksanakan Pengabdian Kepada Masyarakat </h6>
                    </div>
                    <div class="card-body">
                      <div class="col-md m-3">
                        <label for="komponenpm_id">Kegiatan Pengabdian Pada Masyarakat</label>
                        <select class="form-control"  name="inputs[0][komponenpm_id]">
                            <option>Pilih Tingkat Kategori Pengabdian Masyarakat</option>
                            @foreach ($komponenpm as $pm)
                                <option class="" value="{{ $pm->id }}" data-kum-pm ="{{ $pm->angkakredit }}" title="{{$pm->komponenkegiatan}}">{{Str::limit($pm->komponenkegiatan,100)}}</option>
                            @endforeach
                        </select>
                      </div>
                    
                      <div class="form-group row">
                          <div class="col-md m-3">
                              <label for="nama">Nama Kegiatan</label>
                              <input type="text" class="form-control"  name="inputs[0][nama]" placeholder="">
                          </div>
              
                          <div class="col-md m-3">
                              <label for="bentuk">Bentuk</label>
                              <input type="text" class="form-control"  name="inputs[0][bentuk]">
                          </div>
              
                      </div>    
              
                      <div class="form-group row">
                          <div class="col-md m-3">
                              <label for="tempat_instansi">Tempat Instansi</label>
                              <input type="text" class="form-control" name="inputs[0][tempat_instansi]">
                          </div>
                          <div class="col-md m-3">
                            <label for="semester">Semester</label>
                            <select class="form-control"  name="inputs[0][semester_id]">
                                <option>Pilih Semester</option>
                                @foreach ($semester as $s)
                                    <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                                @endforeach
                            </select>
                          </div>
                      </div>
      
                        <script>
                          var selectElem = document.getElementById('komponenpm_id');
                          selectElem.addEventListener('change', function() {
                          var dataKum = this.options[this.selectedIndex].getAttribute('data-kum-pm');
                          document.getElementById('angkakreditpm').value = dataKum;
                          });
                        </script>        
                    
                      <div class="form-group ">
                        <div class="col-md m-3">
                          <label for="bukti">Bukti</label>
                          <input class="form-control @error('buktifisik') is-invalid @enderror" type="file"  name="inputs[0][buktifisik]">
                          @error('buktifisik')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                          @enderror
                        </div>
        
                        <div>
                          <input hidden type="text" value="{{ $kum->id }}"  name="inputs[0][kum_id]">
                        </div>
                        <hr>
                          "Input Data Pengabdian Kepada Masyarakat" adalah proses pengumpulan informasi oleh seorang dosen dengan tujuan merekam dan menghitung angka kredit. Melalui pengumpulan data ini, dosen dapat mencatat dan mengukur kontribusinya dalam pengabdian kepada masyarakat. Informasi yang terkumpul digunakan untuk menghitung nilai kredit dosen berdasarkan partisipasi dan kontribusi yang dilakukan dalam kegiatan pengabdian kepada masyarakat.
        
                      </div>
                    </div>  
                  </div>                  
                </div>
              </div>
              <button id="addButton-pm" class="btn btn-primary" type="button">Tambah</button>
              <button class="btn btn-success" type="submit">Kirim</button>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
              <script>
                var i = 0 ;    
                var z = 0;      
                  $(document).ready(function() {
                    ++i;
  
  
                      // Add new field
  
                      $('#addButton-pm').click(function() {
                          var fieldHTML =
                          '<div id="inputFieldpm"  class = "inputFieldpm">'+
                            '<div class="input-group-pm ">'+
                              '<div class="card shadow mb-4">'+
                                    '<div class="card-header py-3">'+
                                        '<div class="d-flex">'+
                                          '<div class="card-header flex-grow-1 py-3 ">'+
                                            '<h6 class="m-0 font-weight-bold text-primary">Melaksanakan Pengabdian Kepada Masyarakat</h6>'+
                                          '</div>'+
                                          '<div class="input-group-append">'+
                                            '<button class="btn btn-outline-secondary remove-field" type="button">&times;</button>'+
                                          '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="card-body">'+
                                      '<div class="col-md m-3">'+
                                        '<label for="komponenpm_id">Kegiatan Pengabdian Pada Masyarakat</label>'+
                                        '<select class="form-control"  name="inputs['+i+'][komponenpm_id]">'+
                                            '<option>Pilih Tingkat Kategori Pengabdian Masyarakat</option>'+
                                            '@foreach ($komponenpm as $pm)'+
                                                '<option class="" value="{{ $pm->id }}" data-kum-pm ="{{ $pm->angkakredit }}" title="{{$pm->komponenkegiatan}}">{{Str::limit($pm->komponenkegiatan,100)}}</option>'+
                                            '@endforeach'+
                                        '</select>'+
                                      '</div>'+
                                    
                                      '<div class="form-group row">'+
                                          '<div class="col-md m-3">'+
                                              '<label for="nama">Nama Kegiatan</label>'+
                                              '<input type="text" class="form-control"  name="inputs['+i+'][nama]" placeholder="">'+
                                          '</div>'+
                              
                                          '<div class="col-md m-3">'+
                                              '<label for="bentuk">Bentuk</label>'+
                                              '<input type="text" class="form-control"  name="inputs['+i+'][bentuk]">'+
                                          '</div>'+
                              
                                      '</div>'+    
                              
                                      '<div class="form-group row">'+
                                          '<div class="col-md m-3">'+
                                              '<label for="tempat_instansi">Tempat Instansi</label>'+
                                              '<input type="text" class="form-control" name="inputs['+i+'][tempat_instansi]">'+
                                          '</div>'+
                                          '<div class="col-md m-3">'+
                                            '<label for="semester">Semester</label>'+
                                            '<select class="form-control"  name="inputs['+i+'][semester_id]">'+
                                                '<option>Pilih Semester</option>'+
                                                '@foreach ($semester as $s)'+
                                                    '<option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>'+
                                                '@endforeach'+
                                            '</select>'+
                                          '</div>'+
                                      '</div>'+
                      
                                    
                                      '<div class="form-group ">'+
                                        '<div class="col-md m-3">'+
                                          '<label for="bukti">Bukti</label>'+
                                          '<input class="form-control @error('buktifisik') is-invalid @enderror" type="file"  name="inputs['+i+'][buktifisik]">'+
                                          '@error('buktifisik')'+
                                              '<div class="invalid-feedback">'+
                                                  '{{$message}}'+
                                              '</div>'+
                                          '@enderror'+
                                        '</div>'+
                        
                                       ' <div>'+
                                          '<input hidden type="text" value="{{ $kum->id }}"  name="inputs['+i+'][kum_id]">'+
                                        '</div>'+
                                        '<hr>'+
                          '"Input Data Pengabdian Kepada Masyarakat" adalah proses pengumpulan informasi oleh seorang dosen dengan tujuan merekam dan menghitung angka kredit. Melalui pengumpulan data ini, dosen dapat mencatat dan mengukur kontribusinya dalam pengabdian kepada masyarakat. Informasi yang terkumpul digunakan untuk menghitung nilai kredit dosen berdasarkan partisipasi dan kontribusi yang dilakukan dalam kegiatan pengabdian kepada masyarakat.+'                        
                                      '</div>'+
                                    '</div>'+  
                              '</div>'+           
                            '</div>'+
                          '</div>'
  
  
                        $('#inputFieldpm').append(fieldHTML);
  
                      });
                      // Remove field
                      $(document).on('click', '.remove-field', function() {
                          $(this).closest('.input-group-pm').remove();
                      });
                  });              
              </script>
            </form>

          </div>

        </div>
        {{-- . Unsur Dokumen Penunjang  --}}
        <div class="tab-pane fade" id="unsur-tab-pane" role="tabpanel" aria-labelledby="unsur-tab" tabindex="0">

          <div class="col-lg-10 mx-auto" style="margin-top: 30px">
 
            <form method="POST" action="{{ route('unsurdp.store', $kum->id) }}" enctype="multipart/form-data">
              @csrf
              <div id="inputFieldpenunjang" class = "inputFieldpenunjang" >
                <div class="input-group-penunjang ">
                  <div class="col-lg-10 ">
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <h3><b>Input Data Penunjang</b></h3>
                        <br>
                        <a href="{{ route('doumenpenunjang.show',$kum->id) }}" class="btn btn-info">Lihat</a>    

                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Melaksanakan Kegiatan Penunjang</h6>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="namakegiatan_dp">Nama Kegiatan</label>
                            <input type="text" class="form-control"  name="inputs[0][namakegiatan_dp]">
                        </div>
                      </div>
    
                      <div class="form-group ">
                        <div class="col-md m-3">
                          <label for="komponen">Komponen Penunjang</label>
                          <select class="form-control"  name="inputs[0][komponenpenunjang_id]">
                              <option>Pilih Komponen Penunjang</option>
                              @foreach ($komponendokumenpenunjang as $p)
                                  <option class="" value="{{$p->id}}" data-kum ="{{$p->angkakreditmax}}" title="{{$p->komponenkegiatan}}">{{Str::limit($p->komponenkegiatan,100)}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
              
                      <div class="form-group row">
                          <div class="col-md m-3">
                            <label for="instansi_dp">Instansi</label>
                            <input  type="text" class="form-control"  name="inputs[0][instansi_dp]">
                        </div>

                          <div class="col-md m-3">
                              <label for="kedudukan_dp">Kedudukan</label>
                              <input type="text" class="form-control"  name="inputs[0][kedudukan_dp]">
                          </div>
                      </div>
              
                      <div class="form-group row">
                          <div class="col-md m-3">
                              <label for="tanggal_pelaksanaan_dp">Tanggal Pelaksanaan</label>
                              <input type="date" class="form-control" name="inputs[0][tanggal_pelaksanaan_dp]">
                          </div>
                          <div class="col-md m-3">
                            <label for="buktidp">Bukti</label>
                            <input class="form-control @error('buktidp') is-invalid @enderror" type="file"  name="inputs[0][buktidp]">
                            @error('buktidp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                      </div>
      
                      <div>
                        <input hidden type="text" value="{{ $kum->id }}"  name="inputs[0][kum_id]">
                      </div>

                      <hr>
                      "Input Data Penunjang" adalah proses di mana seorang dosen mencatat dan mengumpulkan informasi yang relevan untuk menghitung angka kreditnya. Dalam hal ini, tujuannya adalah merekam dan menghitung jumlah angka kredit yang diperoleh oleh seorang dosen berdasarkan data yang dikumpulkan. Dalam proses ini, dosen mengumpulkan berbagai jenis data penunjang, seperti bukti kegiatan mengajar, penelitian, pengabdian kepada masyarakat, dan pengembangan diri. Data ini kemudian digunakan untuk menghitung jumlah angka kredit yang diperoleh oleh dosen, yang merupakan salah satu faktor penentu dalam penilaian kinerja dan penghargaan bagi seorang dosen.

                    </div>

                  </div>                  
                </div>
              </div>
              <button id="addButton-penunjang" class="btn btn-primary" type="button">Tambah</button>
              <button class="btn btn-success" type="submit">Kirim</button>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
              <script>
                var i = 0 ;    
                var z = 0;      
                  $(document).ready(function() {
                    ++i;
  
  
                      // Add new field
  
                      $('#addButton-penunjang').click(function() {
                          var fieldHTML =
                          '<div id="inputFieldpenunjang"  class = "inputFieldpenunjang">'+
                            '<div class="input-group-penunjang ">'+
                              '<div class="card shadow mb-4">'+
                                    '<div class="card-header py-3">'+
                                        '<div class="d-flex">'+
                                          '<div class="card-header flex-grow-1 py-3 ">'+
                                            '<h6 class="m-0 font-weight-bold text-primary">Melaksanakan Kegiatan Penunjang</h6>'+
                                          '</div>'+
                                          '<div class="input-group-append">'+
                                            '<button class="btn btn-outline-secondary remove-field" type="button">&times;</button>'+
                                          '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="card-body">'+
                                      '<div class="form-group row">'+
                                        '<div class="col-md m-3">'+
                                            '<label for="namakegiatan_dp">Nama Kegiatan</label>'+
                                            '<input type="text" class="form-control"  name="inputs['+i+'][namakegiatan_dp]">'+
                                        '</div>'+
                                      '</div>'+
                    
                                      '<div class="form-group row">'+
                                        '<div class="col-md m-3">'+
                                          '<label for="komponen">Komponen Penunjang</label>'+
                                          '<select class="form-control"  name="inputs['+i+'][komponenpenunjang_id]">'+
                                              '<option>Pilih Komponen Penunjang</option>'+
                                              '@foreach ($komponendokumenpenunjang as $p)'+
                                                  '<option class="" value="{{$p->id}}" data-kum ="{{$p->angkakreditmax}}" title="{{$p->komponenkegiatan}}">{{Str::limit($p->komponenkegiatan,100)}}</option>'+
                                              '@endforeach'+
                                          '</select>'+
                                        '</div>'+
                                      '</div>'+
                              
                                      '<div class="form-group row">'+
                                          '<div class="col-md m-3">'+
                                            '<label for="instansi_dp">Instansi</label>'+
                                            '<input  type="text" class="form-control"  name="inputs['+i+'][instansi_dp]">'+
                                        '</div>'+

                                          '<div class="col-md m-3">'+
                                              '<label for="kedudukan_dp">Kedudukan</label>'+
                                              '<input type="text" class="form-control"  name="inputs['+i+'][kedudukan_dp]">'+
                                          '</div>'+
                                      '</div>'+
                              
                                      '<div class="form-group row">'+
                                          '<div class="col-md m-3">'+
                                              '<label for="tanggal_pelaksanaan_dp">Tanggal Pelaksanaan</label>'+
                                              '<input type="date" class="form-control" name="inputs['+i+'][tanggal_pelaksanaan_dp]">'+
                                          '</div>'+
                                          '<div class="col-md m-3">'+
                                            '<label for="buktidp">Bukti</label>'+
                                            '<input class="form-control @error('buktidp') is-invalid @enderror" type="file"  name="inputs['+i+'][buktidp]">'+
                                            '@error('buktidp')'+
                                                '<div class="invalid-feedback">'+
                                                    '{{$message}}'+
                                                '</div>'+
                                            '@enderror'+
                                        '</div>'+
                                      '</div>'+
                      
                                      '<div>'+
                                        '<input hidden type="text" value="{{ $kum->id }}"  name="inputs['+i+'][kum_id]">'+
                                      '</div>'+
                                      '<hr>'+
                      '"Input Data Penunjang" adalah proses di mana seorang dosen mencatat dan mengumpulkan informasi yang relevan untuk menghitung angka kreditnya. Dalam hal ini, tujuannya adalah merekam dan menghitung jumlah angka kredit yang diperoleh oleh seorang dosen berdasarkan data yang dikumpulkan. Dalam proses ini, dosen mengumpulkan berbagai jenis data penunjang, seperti bukti kegiatan mengajar, penelitian, pengabdian kepada masyarakat, dan pengembangan diri. Data ini kemudian digunakan untuk menghitung jumlah angka kredit yang diperoleh oleh dosen, yang merupakan salah satu faktor penentu dalam penilaian kinerja dan penghargaan bagi seorang dosen.'+
                                    '</div>'+
                              '</div>'+           
                            '</div>'+
                          '</div>'
  
  
                        $('#inputFieldpenunjang').append(fieldHTML);
  
                      });
                      // Remove field
                      $(document).on('click', '.remove-field', function() {
                          $(this).closest('.input-group-penunjang').remove();
                      });
                  });              
              </script>
            </form>
          </div>
        </div>
        {{-- . Unsur Pelaksanaan Penelitian  --}}
        <div class="tab-pane fade" id="pelaksanaanpenelitian-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpenelitian-tab" tabindex="0">

          <div class="col-md-12" style="background-color: #F9F9FE">
            <div class="col-lg-10 mx-auto" style="margin-top: 30px">
              <form method="POST" action="{{ route('karya.store', $kum->id) }}" enctype="multipart/form-data">
                @csrf
                <div id="inputFieldkarya" class = "inputFieldkarya" >
                  <div class="input-group-karya ">
                    <div class="col-lg-10 ">
                      <div class="d-flex">
                        <div class="flex-grow-1">
                          <h3><b>Input Data Karya dan Rancangan</b></h3>
                          <a href="{{ route('pelaksanaanpenelitian.show',$kum->id) }}" class="btn btn-info">Lihat</a>     
                        </div>

                      </div>
                    </div>
                    <br>
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Melaksanakan Kegiatan dengan Output Karya </h6>
                      </div>
                      <div class="card-body">
                          <div class="form-group row">
                              <div class="col-md m-3">
                                  <label for="judul">Judul Karya atau Rancangan</label>
                                  <input type="text" class="form-control"  name="inputs[0][judul]">
                              </div>
                          </div>

                        <div class="form-group row">
                          <div class="col-md m-3">
                            <label for="semester">Jenis Karya atau Rancangan</label>
                            <select class="form-control" name="inputs[0][id_jeniskarya]">
                                <option>Pilih Komponen</option>
                                @foreach ($komponenpenelitian as $s)
                                    <option class="" value="{{$s->id}}" angka-kredit="{{ $s->angkakredit }}" title="{{$s->komponenkegiatan}}">{{Str::limit($s->komponenkegiatan,100)}}</option>
                                @endforeach
                            </select>
                          </div>  

                          <div class="col-md m-3">
                            <label for="semester">Semester</label>
                            <select class="form-control" name="inputs[0][id_semester]">
                                <option>Pilih Semester</option>
                                @foreach ($semester as $s)
                                    <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                                @endforeach
                            </select>
                          </div>     
                          <div class="col-md m-3">
                            <label for="bukti">Bukti</label>
                            <input class="form-control @error('bukti') is-invalid @enderror" type="file"  name="inputs[0][bukti]">
                            @error('bukti')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                          </div>               
                        </div>

                          <input hidden type="text" value="{{ $kum->id }}"  name="inputs[0][id_kum]">
                          <hr>
                          "Input Data Karya dan Rancangan" adalah proses yang dilakukan oleh seorang dosen untuk merekam dan mengumpulkan data terkait karya dan rancangan yang telah mereka hasilkan. Tujuannya adalah untuk menghitung angka kredit dosen berdasarkan data tersebut. Dalam proses ini, dosen mengumpulkan informasi mengenai karya ilmiah, publikasi, proyek, serta aktivitas pengembangan kurikulum yang telah mereka lakukan. Data-data ini kemudian diinput ke dalam sistem untuk dilakukan perhitungan angka kredit dosen.
                      </div>                 
                  </div>
                </div>
                <button id="addButton-karya" class="btn btn-primary" type="button">Tambah</button>
                <button class="btn btn-success" type="submit">Kirim</button>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
                <script>
                  var i = 0 ;    
                  var z = 0;      
                    $(document).ready(function() {
                      ++i;
                        $('#addButton-karya').click(function() {
                            var fieldHTML =
                            '<div class="input-group-karya ">'+
                              '<div class="card shadow mb-4">'+
                                        '<div class="card-header py-3">'+
                                          '<div class="d-flex">'+
                                            '<div class="card-header flex-grow-1 py-3 ">'+
                                              '<h6 class="m-0 font-weight-bold text-primary">Melaksanakan Kegiatan dengan Output Karya </h6>'+
                                            '</div>'+
                                            '<div class="input-group-append">'+
                                              '<button class="btn btn-outline-secondary remove-field" type="button">&times;</button>'+
                                            '</div>'+
                                          '</div>'+
                                        '</div>'+
                                        '<div class="card-body">'+
                                          '<div class="form-group row">'+
                                              '<div class="col-md m-3">'+
                                                  '<label for="judul">Judul Karya atau Rancangan</label>'+
                                                  '<input type="text" class="form-control"  name="inputs['+i+'][judul]">'+
                                              '</div>'+
                                          '</div>'+
                                          '<div class="form-group row">'+
                                              '<div class="col-md m-3">'+
                                                '<label for="semester">Jenis Karya atau Rancangan</label>'+
                                                '<select class="form-control" name="inputs['+i+'][id_jeniskarya]">'+
                                                    '<option>Pilih Komponen</option>'+
                                                    '@foreach ($komponenpenelitian as $s)'+
                                                        '<option class="" value="{{$s->id}}" angka-kredit="{{ $s->angkakredit }}" title="{{$s->komponenkegiatan}}">{{Str::limit($s->komponenkegiatan,100)}}</option>'+
                                                    '@endforeach'+
                                                '</select>'+
                                              '</div>'+
                                              '<div class="col-md m-3">'+
                                                '<label for="semester">Semester</label>'+
                                                '<select class="form-control" name="inputs['+i+'][id_semester]">'+
                                                    '<option>Pilih Semester</option>'+
                                                    '@foreach ($semester as $s)'+
                                                        '<option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>'+
                                                    '@endforeach'+
                                                '</select>'+
                                              '</div>'+     
                                              '<div class="col-md m-3">'+
                                                '<label for="bukti">Bukti</label>'+
                                                '<input class="form-control @error('bukti') is-invalid @enderror" type="file"  name="inputs['+i+'][bukti]">'+
                                                '@error('bukti')'+
                                                    '<div class="invalid-feedback">'+
                                                        '{{$message}}'+
                                                    '</div>'+
                                                '@enderror'+
                                              '</div>'+         
                                          '</div>'+
                                            '<input hidden type="text" value="{{ $kum->id }}"  name="inputs['+i+'][id_kum]">'+
                                          '<hr>'+
                                          '"Input Data Karya dan Rancangan" adalah proses yang dilakukan oleh seorang dosen untuk merekam dan mengumpulkan data terkait karya dan rancangan yang telah mereka hasilkan. Tujuannya adalah untuk menghitung angka kredit dosen berdasarkan data tersebut. Dalam proses ini, dosen mengumpulkan informasi mengenai karya ilmiah, publikasi, proyek, serta aktivitas pengembangan kurikulum yang telah mereka lakukan. Data-data ini kemudian diinput ke dalam sistem untuk dilakukan perhitungan angka kredit dosen.'+
                                        '</div>'+                 
                              '</div>'+
                            '</div>'
                          $('#inputFieldkarya').append(fieldHTML);
    
                        });
                        // Remove field
                        $(document).on('click', '.remove-field', function() {
                            $(this).closest('.input-group-karya').remove();
                        });
                    });              
                </script>
              </form>
            </div>          
          </div>
          <div class="col-lg-10 mx-auto" style="margin-top: 30px">



            <hr class="sidebar-divider">
            <hr class="sidebar-divider">

            <form method="POST" action="{{route('pelaksanaanpenelitian.store')}}" enctype="multipart/form-data" >
                @csrf

                <div class="input-group-penunjang ">
                  <div class="col-lg-10 ">
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <h3><b>Input Data Pelaksanaan Penelitian</b></h3>
                        <br>
                        <a href="{{ route('pelaksanaanpenelitian.show',$kum->id) }}" class="btn btn-info">Lihat</a>    

                      </div>
                    </div>
                    <br>
                  </div>
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Melaksanakan Penelitian </h6>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>
                    </div>
            
                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="jurnal">Jurnal</label>
                            <input type="text" class="form-control" id="jurnal" name="jurnal">
                        </div>
                    </div>
                    <div class="form-group row ">
                      <div class="col-md m-3">
                        <label for="akreditasi">Akreditasi Karya Ilmiah</label>
                        <select class="form-control" id="akreditasi_id" name="akreditasi_id">
                            <option>Pilih Akreditasi</option>
                            @foreach ($akreditasi as $p)
                                <option class="" value="{{$p->id}}" data-kum-akreditasi ="{{$p->nilai}}" title="{{$p->akreditasi}}">{{Str::limit($p->akreditasi,100)}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jenis_penulis">Jenis Penulis</label>
                        @foreach ($jenispenulis as $p)
                        <div class="form-check form-check-inline m-3">
                          <input class="form-check-input" @if($p->penulis_khusus == 1 ) id="penulis_khusus" data="penulis_khusus" @endif type="radio" name="jenis_penulis" kunci="{{$p->id}}" value="{{$p->persentase_skor}}" onclick="updateIdJenisPenulis(this)" >
                          <label class="form-check-label" for="jenis_penulis-{{$p->id}}">{{ $p->jenispenulis }}</label>  
                        </div>
                        @endforeach
                    </div>
    
                    <script>
                      function updateIdJenisPenulis(selectedRadioButton) {
                        var kunci = selectedRadioButton.getAttribute('kunci');
                        document.getElementById('jenispenulis_id').value = kunci;
                      }
                    </script>
    
                    <input hidden id="jenispenulis_id" name="jenispenulis_id">
                    <div class="form-group row">
                        <div class="col-md m-3">
                          <label for="author_persentase">Persentase Penulis</label>
                          <input readonly type="number" class="form-control" id="author_persentase" name="author_persentase"  oninput="getValues()">
                        </div>
                        <div class="col-md m-3">
                            <label for="jumlah_penulis">Jumlah Penulis</label>
                            <input readonly type="number" class="form-control" id="jumlah_penulis" name="jumlah_penulis"  oninput="getValues()">
                        </div>
                        <div class="col-md m-3">
                          <label for="angka_kredit">Angka Kredit</label>
                          <input readonly type="number" class="form-control" id="angkakredit" name="angkakredit" placeholder="isi jumlah penulis dikurangi penulis pertama" onkeyup="calculate()">
                      </div>
                    </div> 
            
                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="tanggal">Tanggal Terbit</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
            
                        <div class="col-md m-3">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div>
                    <div>
                      <input hidden type="text" value="{{ $kum->id }}" id="kum_id" name="kum_id">
                      {{-- <input hidden type="text" value="" id="author_persentase" name="author_persentase"> --}}
                    </div>
    
                    <div class="col-md m-3 text-center">
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>

                    </div>


                  </div>                  
                </div>
            </form>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        var jenispenulis = document.getElementsByName('jenis_penulis');
        var x = document.getElementById('jumlah_penulis');
        var y = document.getElementById('author_persentase');
        
        jenispenulis.forEach(radio => {
            radio.addEventListener('click', function() {
                if (this.id == 'penulis_khusus') {
                    x.setAttribute('readonly', '');
                    y.setAttribute('readonly', '');
                    x.value = "";
                    y.value= "";
                    calculate();                       
                } else {
                  y.removeAttribute('readonly');                  
                  x.removeAttribute('readonly');      
                  calculate();              
               
                }
            });
        });
    </script>
    <script>
          function getValues() {
          var persentase_penulis = document.getElementById('author_persentase').value;
          var selectElem = document.getElementById('akreditasi_id');
          var jenis_penulis = document.getElementsByName("jenis_penulis");
          var jumlah_penulis = document.getElementById('jumlah_penulis').value;
          var dataKum = selectElem.options[selectElem.selectedIndex].getAttribute('data-kum-akreditasi');
          var x = 0;
          var z = 0;

          z = dataKum * persentase_penulis / 100;

          jenis_penulis.forEach(radio => {

          if (radio.checked) {
            skor = parseFloat(radio.value);
            var hasily = 0;
            if (radio.id == 'penulis_khusus') {
              console.log('ini penulis_khusus xxx');
              hasily = ( dataKum * (skor/100));
            } else {
              console.log('ini tidak penulis_khusus xxx');
              console.log('ini datakum', dataKum);
              console.log("ini z",z);
              hasily = z / jumlah_penulis;
            }
            console.log("ini hasil y",hasily);
            document.getElementById("angkakredit").value = hasily;
          }
          });  

          return {
            selectElem: selectElem,
            jenis_penulis: jenis_penulis,
            jumlah_penulis:jumlah_penulis,
            persentase_penulis:persentase_penulis,
            dataKum: dataKum,
            z:z
          };
        }
        function calculate() {
          var values = getValues();
          var jlh_penulis = values.jumlah_penulis;
          var persentase = values.persentase_penulis;
          var dataKum = values.dataKum;
          var z = values.z;
          console.log("menguji",z);
          
          values.jenis_penulis.forEach(radio => {

            if (radio.checked) {
              skor = parseFloat(radio.value);
              var hasil = 0;
              if (radio.id == 'penulis_khusus') {
                console.log('ini penulis_khusus');
                hasil1 = ( dataKum * (skor/100));
              } else {
                console.log('ini tidak penulis_khusus');
                hasilx = (dataKum * (persentase / 100));
                console.log("hasilx",hasilx);
                hasil1 = hasilx /jlh_penulis;
              }
            }
          });    
        }

        // Tambahkan event listener pada setiap elemen HTML yang dibutuhkan
        getValues().selectElem.addEventListener('change', calculate);
        getValues().jenis_penulis.forEach(radio => {
          radio.addEventListener('click', calculate);
        });
        getValues().persentase_penulis.addEventListener('input', calculate);          
        getValues().jumlah_penulis.addEventListener('input', calculate);  

    </script>

@endsection
