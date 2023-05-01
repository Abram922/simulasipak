@extends('.layouts.user')
@section('content1')

<br>
<br>
<br>

<div class="jumbotron d-flex" > 
        <div class="">
            <h3>Hi,{{ Auth::user()->name }}</h3>
            <p style="">Kelola Data Kamu Disini</p>
        </div>
        <div class="ms-auto" style="background-image: url('{{ asset('aset_web/p1.png') }}')">
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
          <button class="nav-link" id="pelaksanaanpendidikan-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpendidikan-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpendidikan-tab-pane" aria-selected="false">Pelaksanaan Pendidikan || {{ $sumpelaksanaanpendidikan }}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pelaksanaanpenelitian-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpenelitian-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpenelitian-tab-pane" aria-selected="false">Pelaksanaan Penelitian || {{ $sumpelaksanaanpenelitian }}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pelaksanaanpengabdian-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpengabdian-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpengabdian-tab-pane" aria-selected="false">Pengabdian Kepada Masyarakat || {{ $sumpelaksanaanpm }}</button>
        </li> 
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="unsur-tab" data-bs-toggle="tab" data-bs-target="#unsur-tab-pane" type="button" role="tab" aria-controls="unsur-tab-pane" aria-selected="false">Unsur Penunjang || {{ $sumdp }}</button>
        </li>
      </ul>


      <div class="tab-content mb-4" id="myTabContent">
        {{-- 1. Unsur Pendidikan  --}}        
        <div class="tab-pane fade show active" id="pendidikan-tab-pane" role="tabpanel" aria-labelledby="pendidikan-tab" tabindex="0">
            <div class="col-lg-10" style="margin-top: 30px">
              <h3><b>Input Data Pendidikan</b> </h3>     
              <form method="POST" action="{{ route('pendidikan.store') }}" enctype="multipart/form-data">
                @csrf
              
                <div class="form-group row">
                    <div class="col-md m-3">
                        <label for="institusi">Institusi Pendidikan</label>
                        <input type="text" class="form-control" id="institusi" name="institusi">
                    </div>
                </div>
                <div class="form-group ">
                  <div class="col-md m-3">
                    <label for="stratapendidikan">Strata Pendidikan</label>
                    <select class="form-control" id="strata_id" name="strata_id">
                        <option>Pilih Tingkat Strata Pendidikan</option>
                        @foreach ($strata_pendidikan as $p)
                            <option class="" value="{{$p->id}}" data-kum ="{{$p->nilai}}" title="{{$p->strata}}">{{Str::limit($p->strata,100)}}</option>
                        @endforeach
                    </select>
                  </div>

                </div>
        
                <div class="form-group row">
                    <div class="col-md m-3">
                        <label for="tanggal">Tanggal Kelulusan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
        
        
                    <div class="col-md m-3">
                        <label for="kum">Jumlah KUM</label>
                        <input disabled type="text" class="form-control" id="kum" name="kum">
                    </div>
                </div>
        
                
                <div class="form-group ">
                  <div class="col-md m-3">
                    <label for="bukti">Bukti</label>
                    <input class="form-control @error('bukti') is-invalid @enderror" type="file" id="bukti" name="bukti">
                    @error('bukti')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                </div>

                <div class="col-md m-3 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <div>
                  <input hidden type="text" value="{{ $kum->id }}" id="kum_id" name="kum_id">
                </div>


        
                <script>
                var selectElem = document.getElementById('strata_id');
                selectElem.addEventListener('change', function() {
                var dataKum = this.options[this.selectedIndex].getAttribute('data-kum');
                document.getElementById('kum').value = dataKum;
                });
                </script>
              </form>

              <div class="col-md">
                <table class="table">
                  <thead>
                      <th>No</th>
                      <th>Institusi Pendidikan</th>
                      <th>Strata Pendidikan</th>
                      <th>File</th>
                      <th>Aksi</th>
                  </thead>
        
                  @foreach ($pendidikan as $pd)
                  <tbody>
                          <td></td>
                          <td>{{ $pd->institusi }}</td>
                          <td>{{ $pd->strata->strata }}</td>
                          <td><a href="/buktipendidikan/{{ $pd->bukti }}" target="_blank" class="btn btn-warning">Lihat File</a></td>
                          <td>{{ $pd->jumlahAngkaKredit }}</td>                
                          <td>
        
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pendidikan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ route('pendidikan.update', $pd->id) }}" method="POST">
                                      @csrf
                                      @method('PUT')
                                        <div class="form-group row">
                                          <div class="col-md m-3">
                                                <label for="institusi">Institusi Pendidikan</label>
                                                <input type="text" class="form-control" id="institusi" name="institusi" placeholder="">
                                            </div>
                                          </div>
                                          <div class="form-group ">
                                            <div class="col-md m-3">
                                              <label for="stratapendidikan">Strata Pendidikan</label>
                                              <select class="form-control" id="strata_id" name="strata_id">
                                                  <option>Pilih Tingkat Strata Pendidikan</option>
                                                  @foreach ($strata_pendidikan as $p)
                                                      <option class="" value="{{$p->id}}" data-kum ="{{$p->nilai}}" title="{{$p->strata}}">{{Str::limit($p->strata,100)}}</option>
                                                  @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-md m-3">
                                                  <label for="tanggal">Tanggal Kelulusan</label>
                                                  <input type="date" class="form-control" id="tanggal" name="tanggal">
                                              </div>
                                              <div class="col-md m-3">
                                                  <label for="kum">Jumlah KUM</label>
                                                  <input disabled type="text" class="form-control" id="kum" name="kum">
                                              </div>
                                          </div>
                                          <div class="form-group ">
                                            <div class="col-md m-3">
                                              <label for="bukti">Bukti</label>
                                              <input class="form-control @error('bukti') is-invalid @enderror" type="file" id="bukti" name="bukti">
                                              @error('bukti')
                                                  <div class="invalid-feedback">
                                                      {{$message}}
                                                  </div>
                                              @enderror
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>                                  
                      
                                </div>
                              </div>
                            </div>
                              <a href="{{ route('pendidikan.edit', $pd->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ubah</a>
                              <form action="{{ route('pendidikan.destroy', $pd->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
                            </form>
        
                          </td>
                  </tbody>
                  @endforeach
                  
        
                </table>
              </div>
            </div>
        </div>
        {{-- 2. Unsur Pelaksanaan Pendidikan  --}}
        <div class="tab-pane fade" id="pelaksanaanpendidikan-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpendidikan-tab" tabindex="0">
          <div class="col-lg-10" style="margin-top: 30px">
            <h3><b>Input Data Pelaksanaan Pendidikan</b> </h3>
            <form method="POST" action="{{route('pelaksanaanpendidikan.store')}}" enctyp  e="multipart/form-data" >
              @csrf
      
              <div class="form-group row">
                  <div class="col-md m-3">
                      <label for="nama_kegiatan">Nama Kegiatan</label>
                      <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                  </div>
                  <div class="col-md m-3">
                      <label for="tempat_instansi">Tempat Instansi</label>
                      <input type="text" class="form-control" id="tempat_instansi" name="tempat_instansi">
                  </div>
                  <div class="col-md m-3">
                      <label for="semester">Semester</label>
                      <select class="form-control" id="semester_id" name="semester_id">
                          <option>Pilih Semester</option>
                          @foreach ($semester as $s)
                              <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
      
              <div class="form-group row ">
                <div class="col-md m-3">
                  <label for="jenispelaksanaan">Jenis Pelaksanaan</label>
                  <select class="form-control" id="idjenispelaksanaan" name="idjenispelaksanaan">
                      <option>Pilih Jenis Pelaksanaan</option>
                      @foreach ($jenis_pelaksanaan_pendidikan as $p)
                          <option @if($p->withsks == 0 ) id="is-sks" @endif class="" value="{{$p->id}}" title="{{$p->jenispelaksanaan}}">{{Str::limit($p->jenispelaksanaan,100)}}</option>
                      @endforeach
                  </select>                  
                </div>
              </div>

              <div class="form-group row">
                  <div class="col-md m-3">
                      <label for="jumlah_kelas">Kelas</label>
                      <input readonly type="number" class="form-control x" id="jumlah_kelas" name="jumlah_kelas" onkeyup="sum()">
                  </div>
                  <div class="col-md m-3">
                      <label for="volume_dosen">Volume Dosen</label>
                      <input readonly type="number" class="form-control x" id="volume_dosen" name="volume_dosen" onkeyup="sum()" >
                  </div>
                  <div class="col-md m-3">
                      <label for="sks">SKS</label>
                      <input readonly type="number" class="form-control x" id="sks" name="sks" onkeyup="sum()">
                  </div>
                  <input  hidden type="number" class="form-control" id="kelasxvdosen" name="kelasxvdosen">
                  <div class="col-md m-3">
                      <label for="jumlah_angka_kredit">Angka Kredit</label>
                      <input type="number" class="form-control" id="jumlah_angka_kredit" name="jumlah_angka_kredit" onkeyup="sum()">
                  </div>
                  <input  hidden type="number" class="form-control" id="hasil3" name="hasil3">
              </div>

              <div>
                <input hidden type="text" value="{{ $kum->id }}" id="kum_id" name="kum_id">
              </div>

              <div class="form-group row ">
                <div class="col-md m-3">
                  <label for="keterangan">Keterangan Kegiatan</label>
                  <input  type="text" class="form-control" id="keterangan" name="keterangan"  placeholder="maksimal 100 kata">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md m-3">
                  <label for="bukti">Bukti</label>
                  <input class="form-control @error('bukti') is-invalid @enderror" type="file" id="bukti" name="bukti">
                  @error('bukti')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
                </div>

              </div>

              <div class="col-md m-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              <script>
                  const selectElement = document.getElementById('idjenispelaksanaan');
                  const sks = document.getElementById('sks');
                  const volumeDosen = document.getElementById('volume_dosen');
                  const angkaKredit = document.getElementById('jumlah_angka_kredit');
                  const jumlahkelas = document.getElementById('jumlah_kelas');
                  selectElement.onchange = function() {
                     var options = selectElement.options[selectElement.selectedIndex];
                     
                     if(options.id == 'is-sks'){
                          sks.removeAttribute('readonly');
                          jumlahkelas.removeAttribute('readonly');
                          volumeDosen.removeAttribute('readonly');
                          angkaKredit.setAttribute('readonly','');
                     }else{
                          sks.setAttribute('readonly','');
                          jumlahkelas.setAttribute('readonly','');
                          volumeDosen.setAttribute('readonly','');
                          angkaKredit.removeAttribute('readonly');

                          angkaKredit.removeAttribute()
                     }
                     
                  }
                  function sum(){
                      var ckelas = document.getElementById("jumlah_kelas").value ;
                      var cvolumeDosen = document.getElementById("volume_dosen").value ;
                      var csks = document.getElementById("sks").value ;
                      var ckelasxvdosen = document.getElementById("kelasxvdosen").value ;
          
                      
                      var hasil1 = parseFloat(ckelas)*parseFloat(cvolumeDosen);
          
                      if(!isNaN(hasil1)){
                          document.getElementById("kelasxvdosen").value = parseFloat(hasil1);
                      }
          
                      var hasil2 = parseFloat(ckelasxvdosen) / parseFloat(csks);
                      if(!isNaN(hasil2)){
                          document.getElementById("jumlah_angka_kredit").value = parseFloat(hasil2);
                      }
                  }
              </script>
            </form>
            <div class="col-md">
              <table class="table">
                <thead>
                    <th>No</th>
                    <th>Jenis Pelaksanaan</th>
                    <th>Semester</th>
                    <th>Kegiatan Pendidikan dan Pengajaran</th>
                    <th>Tempat/Instansi</th>
                    <th>SKS</th>
                    <th>Jumlah Kelas</th>
                    <th>Angka Kredit</th>
                    <th>File</th>
                    <th>Aksi</th>
                </thead>
      
                @foreach ($pelaksanaan_pendidikan as $pk)
                <tbody>
                        <td></td>
                        <td>{{ $pk->jenispelaksanaan->jenispelaksanaan }}</td>
                        <td>{{ $pk->semester->semester}}</td>
                        <td>{{ $pk->nama_kegiatan }}</td>
                        <td>{{ $pk->tempat_instansi }}</td>
                        <td>{{ $pk->sks }}</td>
                        <td>{{ $pk->jumlah_kelas }}</td>
                        <td>{{ $pk->jumlah_angka_kredit }}</td>
                        <td><a href="" target="_blank" class="btn btn-warning">Lihat File</a></td>
                        <td>
      
                          <div class="modal fade" id="pelaksanaan_pendidikan_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Pelaksanaan Pendidikan</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                  <form method="POST" action="{{route('pelaksanaanpendidikan.update', $pk->id)}}" enctyp  e="multipart/form-data" >
                                    @csrf
                                    @method('PUT')
                            
                                    <div class="form-group row">
                                        <div class="col-md m-3">
                                            <label for="nama_kegiatan">Nama Kegiatan</label>
                                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                                        </div>
                                        <div class="col-md m-3">
                                            <label for="tempat_instansi">Tempat Instansi</label>
                                            <input type="text" class="form-control" id="tempat_instansi" name="tempat_instansi">
                                        </div>
                                        <div class="col-md m-3">
                                            <label for="semester">Semester</label>
                                            <select class="form-control" id="semester_id" name="semester_id">
                                                <option>Pilih Semester</option>
                                                @foreach ($semester as $s)
                                                    <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="form-group row ">
                                      <div class="col-md m-3">
                                        <label for="jenispelaksanaan">Jenis Pelaksanaan</label>
                                        <select class="form-control" id="idjenispelaksanaan" name="idjenispelaksanaan">
                                            <option>Pilih Jenis Pelaksanaan</option>
                                            @foreach ($jenis_pelaksanaan_pendidikan as $p)
                                                <option @if($p->withsks == 0 ) id="is-sks" @endif class="" value="{{$p->id}}" title="{{$p->jenispelaksanaan}}">{{Str::limit($p->jenispelaksanaan,100)}}</option>
                                            @endforeach
                                        </select>                  
                                      </div>
                                    </div>
                      
                                    <div class="form-group row">
                                        <div class="col-md m-3">
                                            <label for="jumlah_kelas">Kelas</label>
                                            <input readonly type="number" class="form-control x" id="jumlah_kelas" name="jumlah_kelas" onkeyup="sum()">
                                        </div>
                                        <div class="col-md m-3">
                                            <label for="volume_dosen">Volume Dosen</label>
                                            <input readonly type="number" class="form-control x" id="volume_dosen" name="volume_dosen" onkeyup="sum()" >
                                        </div>
                                        <div class="col-md m-3">
                                            <label for="sks">SKS</label>
                                            <input readonly type="number" class="form-control x" id="sks" name="sks" onkeyup="sum()">
                                        </div>
                                        <input  hidden type="number" class="form-control" id="kelasxvdosen" name="kelasxvdosen">
                                        <div class="col-md m-3">
                                            <label for="jumlah_angka_kredit">Angka Kredit</label>
                                            <input type="number" class="form-control" id="jumlah_angka_kredit" name="jumlah_angka_kredit" onkeyup="sum()">
                                        </div>
                                        <input  hidden type="number" class="form-control" id="hasil3" name="hasil3">
                                    </div>
                      
                                    <div class="form-group row ">
                                      <div class="col-md m-3">
                                        <label for="keterangan">Keterangan Kegiatan</label>
                                        <input  type="text" class="form-control" id="keterangan" name="keterangan"  placeholder="maksimal 100 kata">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-md m-3">
                                        <label for="bukti">Bukti</label>
                                        <input class="form-control @error('bukti') is-invalid @enderror" type="file" id="bukti" name="bukti">
                                        @error('bukti')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                      </div>
                      
                                    </div>
                      
                                    <script>
                                        const selectElement = document.getElementById('idjenispelaksanaan');
                                        const sks = document.getElementById('sks');
                                        const volumeDosen = document.getElementById('volume_dosen');
                                        const angkaKredit = document.getElementById('jumlah_angka_kredit');
                                        const jumlahkelas = document.getElementById('jumlah_kelas');
                                        selectElement.onchange = function() {
                                           var options = selectElement.options[selectElement.selectedIndex];
                                           
                                           if(options.id == 'is-sks'){
                                                sks.removeAttribute('readonly');
                                                jumlahkelas.removeAttribute('readonly');
                                                volumeDosen.removeAttribute('readonly');
                                                angkaKredit.setAttribute('readonly','');
                                           }else{
                                                sks.setAttribute('readonly','');
                                                jumlahkelas.setAttribute('readonly','');
                                                volumeDosen.setAttribute('readonly','');
                                                angkaKredit.removeAttribute('readonly');
                      
                                                angkaKredit.removeAttribute()
                                           }
                                           
                                        }
                                        function sum(){
                                            var ckelas = document.getElementById("jumlah_kelas").value ;
                                            var cvolumeDosen = document.getElementById("volume_dosen").value ;
                                            var csks = document.getElementById("sks").value ;
                                            var ckelasxvdosen = document.getElementById("kelasxvdosen").value ;
                                
                                            
                                            var hasil1 = parseFloat(ckelas)*parseFloat(cvolumeDosen);
                                
                                            if(!isNaN(hasil1)){
                                                document.getElementById("kelasxvdosen").value = parseFloat(hasil1);
                                            }
                                
                                            var hasil2 = parseFloat(ckelasxvdosen) / parseFloat(csks);
                                            if(!isNaN(hasil2)){
                                                document.getElementById("jumlah_angka_kredit").value = parseFloat(hasil2);
                                            }
                                        }
                                    </script>

                                  </div>


                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                      </div>
                                </form>                                  
                    
                              </div>
                            </div>
                          </div>
                            <a href="{{ route('pelaksanaanpendidikan.edit', $pk->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pelaksanaan_pendidikan_Modal">ubah</a>
                            <form action="{{ route('pelaksanaanpendidikan.destroy', $pk->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
                          </form>
      
                        </td>
              

                </tbody>
                @endforeach
                
      
              </table>
            </div>
          </div>
        </div>
        {{-- 3. Unsur Pelaksanaan Penelitian  --}}
        <div class="tab-pane fade" id="pelaksanaanpenelitian-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpenelitian-tab" tabindex="0">
          <div class="col-lg-10" style="margin-top: 30px">
            <h3>Input Data Penelitian</h3>
            <br>
        
        
        
            <form method="POST" action="{{route('pelaksanaanpenelitian.store')}}" enctype="multipart/form-data" >
                @csrf
        
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
                  <div class="col-md m-3">
                    <label for="penulis">Jenis Penulis</label>
                    <select class="form-control" id="jenispenulis_id" name="jenispenulis_id">
                        <option>Pilih  Jenis Penulis</option>
                        @foreach ($jenispenulis as $p)
                            <option  @if($p->id == 1 ) id="first-author" @endif class="" value="{{$p->id}}" data-percentage ="{{$p->persentase_skor}}" title="{{$p->jenispenulis}}">{{Str::limit($p->jenispenulis,100)}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
        
               
        
        
                <div class="form-group row">
                    <div class="col-md m-3">
                        <label for="jumlah_penulis">Jumlah Penulis</label>
                        <input readonly type="number" class="form-control" id="jumlah_penulis" name="jumlah_penulis" placeholder="isi jumlah penulis dikurangi penulis pertama" onkeyup="sum()">
                    </div>
        
                    <div class="col-md m-3">
                        <label for="kum">Jumlah KUM</label>
                        <input readonly type="number" class="form-control" id="angkakredit" name="angkakredit" onkeyup="sum()">
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
                </div>

                <div>
                  <input hidden type="text" value="{{ $kum->id }}" id="kum_id" name="kum_id">
                </div>
        


        
                <p id="y"></p>
                <p id="z"></p>

                <div class="col-md m-3 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>


                <script>

                  const jenispenulis = document.getElementById('jenispenulis_id')
                  const x = document.getElementById('jumlah_penulis')
      
                  jenispenulis.onchange = function(){
                      var options = jenispenulis.options[jenispenulis.selectedIndex];
                      if(options.id == 'first-author'){
                        x.setAttribute('readonly','');
                        x.value = '';
                      }else{
                          x.removeAttribute('readonly');                        
                          x.value = '';
                      }
                  }        
              </script>
        
                <script>
                    var selectElem = document.getElementById('akreditasi_id');
                    var selectElem2 = document.getElementById('jenispenulis_id');
                    var jumlahpenulis = document.getElementById('jenispenulis_id');
                
                    selectElem.addEventListener('change', function() {
                        var dataKum = this.options[this.selectedIndex].getAttribute('data-kum-akreditasi');
                        console.log(dataKum);
                
                    selectElem2.addEventListener('change', function() {
                        var datapersen = this.options[this.selectedIndex].getAttribute('data-percentage');
                        console.log(datapersen);
                        
                
                    var hasil1 = parseFloat(dataKum) * (parseFloat(datapersen) / 100);
                    console.log(hasil1);
                
                    document.getElementById("angkakredit").value = hasil1;
                    });
                    });
                </script>

                <script>
                    var selectElem = document.getElementById('penulis');
                    selectElem.addEventListener('change', function() {
                    var dataKum = this.options[this.selectedIndex].getAttribute('data-percentage');
                    document.getElementById('xz').value = dataKum;
                    });
                </script>
                <script>
                    jumlahPenulis.onkeyup = function(){
                        sum();
                    }
        
                    function sum(){
                        var dataKum = document.getElementById('jumlah_penulis').value;
                        var datapersen = document.getElementById('jumlah_penulis').value;
                        var x = document.getElementById('jumlah_penulis').value;
        
                        console.log(dataKum);
                        console.log(datapersen);
                        console.log(x);
        
                        
        
                        if(x != null){
                            var hasil1 = parseFloat(dataKum) * parseFloat(datapersen)
                            var hasil2 = parseFloat(hasil1) / parseFloat(x)
                            if(!isNaN(hasil2)){
                                document.getElementById("angkakredit").value = parseFloat(hasil2);
                            }
                        } 
                        else(x == null){
                            var hasil3 = (parseFloat(dataKum) * (parseFloat(datapersen) / 100));
        
                            if(!isNaN(hasil3)){
                                document.getElementById("angkakredit").value = parseFloat(hasil3);
                            }
                            
                        } 
                    }
                </script>
            </form>

            <div class="col-lg-10" style="margin-top: 30px">          
              <table class="table">
                  <thead>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Akreditasi</th>
                      <th>Angka Kredit</th>
                      <th>Aksi</th>
                  </thead>
          
                  @foreach ($pelaksanan_penelitian as $pn)
                  <tbody>
                          <td></td>
                          <td>{{ $pn->judul }}</td>
                          <td>{{ $pn->akreditasi_id }}</td>
                          <td>{{ $pn->angkakredit }}</td>              
                          <td>
      
                            <div class="modal fade" id="pelaksanaan_penelitian_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Penelitian</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                        <div class="modal-body">

                                          <form method="POST" action="{{route('pelaksanaanpenelitian.update', $pn->id)}}" enctype="multipart/form-data" >
                                                  @csrf
                                                  @method('PUT')
                                          
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
                                                    <div class="col-md m-3">
                                                      <label for="penulis">Jenis Penulis</label>
                                                      <select class="form-control" id="jenispenulis_id" name="jenispenulis_id">
                                                          <option>Pilih  Jenis Penulis</option>
                                                          @foreach ($jenispenulis as $p)
                                                              <option  @if($p->id == 1 ) id="first-author" @endif class="" value="{{$p->id}}" data-percentage ="{{$p->persentase_skor}}" title="{{$p->jenispenulis}}">{{Str::limit($p->jenispenulis,100)}}</option>
                                                          @endforeach
                                                      </select>
                                                    </div>
                                                  </div>
                                          
                                                
                                          
                                          
                                                  <div class="form-group row">
                                                      <div class="col-md m-3">
                                                          <label for="jumlah_penulis">Jumlah Penulis</label>
                                                          <input readonly type="number" class="form-control" id="jumlah_penulis" name="jumlah_penulis" placeholder="isi jumlah penulis dikurangi penulis pertama" onkeyup="sum()">
                                                      </div>
                                          
                                                      <div class="col-md m-3">
                                                          <label for="kum">Jumlah KUM</label>
                                                          <input readonly type="number" class="form-control" id="angkakredit" name="angkakredit" onkeyup="sum()">
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
                                                  </div>
                                  
                                          
                                  
                                  
                                          
                                                  <p id="y"></p>
                                                  <p id="z"></p>
                                  
                                                  <script>
                                  
                                                    const jenispenulis = document.getElementById('jenispenulis_id')
                                                    const x = document.getElementById('jumlah_penulis')
                                        
                                                    jenispenulis.onchange = function(){
                                                        var options = jenispenulis.options[jenispenulis.selectedIndex];
                                                        if(options.id == 'first-author'){
                                                          x.setAttribute('readonly','');
                                                          x.value = '';
                                                        }else{
                                                            x.removeAttribute('readonly');                        
                                                            x.value = '';
                                                        }
                                                    }        
                                                </script>
                                                  <script>
                                                      var selectElem = document.getElementById('akreditasi_id');
                                                      var selectElem2 = document.getElementById('jenispenulis_id');
                                                      var jumlahpenulis = document.getElementById('jenispenulis_id');
                                                  
                                                      selectElem.addEventListener('change', function() {
                                                          var dataKum = this.options[this.selectedIndex].getAttribute('data-kum-akreditasi');
                                                          console.log(dataKum);
                                                  
                                                      selectElem2.addEventListener('change', function() {
                                                          var datapersen = this.options[this.selectedIndex].getAttribute('data-percentage');
                                                          console.log(datapersen);
                                                          
                                                  
                                                      var hasil1 = parseFloat(dataKum) * (parseFloat(datapersen) / 100);
                                                      console.log(hasil1);
                                                  
                                                      document.getElementById("angkakredit").value = hasil1;
                                                      });
                                                      });
                                                  </script>                                 
                                                  <script>
                                                      var selectElem = document.getElementById('penulis');
                                                      selectElem.addEventListener('change', function() {
                                                      var dataKum = this.options[this.selectedIndex].getAttribute('data-percentage');
                                                      document.getElementById('xz').value = dataKum;
                                                      });
                                                  </script>
                                                  <script>
                                                      jumlahPenulis.onkeyup = function(){
                                                          sum();
                                                      }
                                          
                                                      function sum(){
                                                          var dataKum = document.getElementById('jumlah_penulis').value;
                                                          var datapersen = document.getElementById('jumlah_penulis').value;
                                                          var x = document.getElementById('jumlah_penulis').value;
                                          
                                                          console.log(dataKum);
                                                          console.log(datapersen);
                                                          console.log(x);
                                          
                                                          
                                          
                                                          if(x != null){
                                                              var hasil1 = parseFloat(dataKum) * parseFloat(datapersen)
                                                              var hasil2 = parseFloat(hasil1) / parseFloat(x)
                                                              if(!isNaN(hasil2)){
                                                                  document.getElementById("angkakredit").value = parseFloat(hasil2);
                                                              }
                                                          } 
                                                          else(x == null){
                                                              var hasil3 = (parseFloat(dataKum) * (parseFloat(datapersen) / 100));
                                          
                                                              if(!isNaN(hasil3)){
                                                                  document.getElementById("angkakredit").value = parseFloat(hasil3);
                                                              }
                                                              
                                                          } 
                                                      }
                                                  </script>
                                        </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>                                  
                      
                                </div>
                              </div>
                            </div>
                              <a href="{{ route('pelaksanaanpenelitian.edit', $pn->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pelaksanaan_penelitian_Modal">ubah</a>
                              <form action="{{ route('pelaksanaanpenelitian.destroy', $pn->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
                            </form>
        
                          </td>
                  </tbody>
                  @endforeach  
              </table>
          
              <table class="table">
                </table>
          
          
          </div>
        </div>
        </div>
        {{-- 4. Unsur Pelaksanaan Pengabdian Masyarakat  --}}
        <div class="tab-pane fade" id="pelaksanaanpengabdian-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpengabdian-tab" tabindex="0">
          <div class="col-lg-10" style="margin-top: 30px">
              <h3>Input Data Pengabdian Kepada Masyarakat</h3>
              <br>
              <form method="POST" action="{{route('pelaksanaan_pm.store')}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group ">
                  <div class="col-md m-3">
                    <label for="komponenpm_id">Kegiatan Pengabdian Pada Masyarakat</label>
                    <select class="form-control" id="komponenpm_id" name="komponenpm_id">
                        <option>Pilih Tingkat Kategori Pengabdian Masyarakat</option>
                        @foreach ($komponenpm as $pm)
                            <option class="" value="{{ $pm->id }}" data-kum-pm ="{{ $pm->angkakredit }}" title="{{$pm->komponenkegiatan}}">{{Str::limit($pm->komponenkegiatan,100)}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
        
        
                <div class="form-group row">
                    <div class="col-md m-3">
                        <label for="nama">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                    </div>
        
                    <div class="col-md m-3">
                        <label for="bentuk">Bentuk</label>
                        <input type="text" class="form-control" id="bentuk" name="bentuk">
                    </div>
        
                </div>    
        
                <div class="form-group row">
                    <div class="col-md m-3">
                        <label for="tempat_instansi">Tempat Instansi</label>
                        <input type="text" class="form-control" id="tempat_instansi" name="tempat_instansi">
                    </div>
                    <div class="col-md m-3">
                      <label for="semester">Semester</label>
                      <select class="form-control" id="semester_id" name="semester_id">
                          <option>Pilih Semester</option>
                          @foreach ($semester as $s)
                              <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="col-md m-3">
                        <label for="angkakredit">Angka Kredit</label>
                        <input readonly type="number" class="form-control" id="angkakreditpm" name="angkakreditpm">
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
                    <input class="form-control @error('buktifisik') is-invalid @enderror" type="file" id="buktifisik" name="buktifisik">
                    @error('buktifisik')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div>
                    <input hidden type="text" value="{{ $kum->id }}" id="kum_id" name="kum_id">
                  </div>

                </div>
                <div class="col-md m-3 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>




              </form>

            <table class="table">
              <thead>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Tempat Instansi</th>
                  <th>Angka Kredit</th>
                  <th>File</th>
                  <th>Aksi</th>
              </thead>
      
              @foreach ($pelaksanaan_pm as $p)
              <tbody>
                      <td></td>
                      <td>{{ $p->nama }}</td>
                      <td>{{ $p->tempat_instansi }}</td>
                      <td>{{ $p->angkakreditpm }}</td>
                      <td><a href="/buktipm/{{ $p->buktifisik }}" target="_blank" class="btn btn-warning">Lihat File</a></td>
                      <td>
        
                        <div class="modal fade" id="pelaksanaan_pm_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Penelitian</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                                    <div class="modal-body">
                                      <form method="POST" action="{{route('pelaksanaan_pm.update', $p->id)}}" enctype="multipart/form-data" >
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group ">
                                          <div class="col-md m-3">
                                            <label for="komponenpm_id">Kegiatan Pengabdian Pada Masyarakat</label>
                                            <select class="form-control" id="komponenpm_id" name="komponenpm_id">
                                                <option>Pilih Tingkat Kategori Pengabdian Masyarakat</option>
                                                @foreach ($komponenpm as $pm)
                                                    <option class="" value="{{ $pm->id }}" data-kum-pm ="{{ $pm->angkakredit }}" title="{{$pm->komponenkegiatan}}">{{Str::limit($pm->komponenkegiatan,100)}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                        </div>
                                
                                
                                        <div class="form-group row">
                                            <div class="col-md m-3">
                                                <label for="nama">Nama Kegiatan</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="">
                                            </div>
                                
                                            <div class="col-md m-3">
                                                <label for="bentuk">Bentuk</label>
                                                <input type="text" class="form-control" id="bentuk" name="bentuk">
                                            </div>
                                
                                        </div>    
                                
                                        <div class="form-group row">
                                            <div class="col-md m-3">
                                                <label for="tempat_instansi">Tempat Instansi</label>
                                                <input type="text" class="form-control" id="tempat_instansi" name="tempat_instansi">
                                            </div>
                                            <div class="col-md m-3">
                                              <label for="semester">Semester</label>
                                              <select class="form-control" id="semester_id" name="semester_id">
                                                  <option>Pilih Semester</option>
                                                  @foreach ($semester as $s)
                                                      <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="col-md m-3">
                                                <label for="angkakredit">Angka Kredit</label>
                                                <input readonly type="number" class="form-control" id="angkakreditpm" name="angkakreditpm">
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
                                            <input class="form-control @error('buktifisik') is-invalid @enderror" type="file" id="buktifisik" name="buktifisik">
                                            @error('buktifisik')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                          </div>
                          
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                      </form>
                                    </div>
                            </div>
                          </div>
                        </div>
                          <a href="{{ route('pelaksanaan_pm.edit', $p->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pelaksanaan_pm_Modal">ubah</a>
                          <form action="{{ route('pelaksanaan_pm.destroy', $p->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
                        </form>
    
                      </td>
              </tbody>
              @endforeach  
            </table>
          </div>

        </div>
        {{-- 5. Unsur Dokumen Penunjang  --}}
        <div class="tab-pane fade" id="unsur-tab-pane" role="tabpanel" aria-labelledby="unsur-tab" tabindex="0">
          <div class="col-lg-10" style="margin-top: 30px">
            <h3>Input Data Dokumen Penunjang</h3>
            <br>        
            <form method="POST" action="{{route('unsurdp.store')}}" enctype="multipart/form-data" >
                @csrf
        
                <div class="form-group row">
                    <div class="col-md m-3">
                        <label for="namakegiatan_dp">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="namakegiatan_dp" name="namakegiatan_dp">
                    </div>
                </div>

                <div class="form-group ">
                  <div class="col-md m-3">
                    <label for="komponen">Komponen Penunjang</label>
                    <select class="form-control" id="komponenpenunjang_id" name="komponenpenunjang_id">
                        <option>Pilih Komponen Penunjang</option>
                        @foreach ($komponendokumenpenunjang as $p)
                            <option class="" value="{{$p->id}}" data-kum ="{{$p->angkakreditmax}}" title="{{$p->komponenkegiatan}}">{{Str::limit($p->komponenkegiatan,100)}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
        
                <div class="form-group row">
                    <div class="col-md m-3">
                        <label for="kedudukan_dp">Kedudukan</label>
                        <input type="text" class="form-control" id="kedudukan_dp" name="kedudukan_dp">
                    </div>
        
        
                    <div class="col-md m-3">
                        <label for="instansi_dp">Instansi</label>
                        <input  type="text" class="form-control" id="instansi_dp" name="instansi_dp">
                    </div>
                </div>
        
        
                <div class="form-group row">
                    <div class="col-md m-3">
                        <label for="tanggal_pelaksanaan_dp">Tanggal Pelaksanaan</label>
                        <input type="date" class="form-control" id="tanggal_pelaksanaan_dp" name="tanggal_pelaksanaan_dp">
                    </div>
                    <div class="col-md m-3">
                        <label for="angkakredit_dp">Angka Kredit</label>
                        <input readonly type="integer" class="form-control" id="angkakredit_dp" name="angkakredit_dp">
                    </div>
                </div>
        
                
                <div class="form-group ">
                  <div class="com-md m-3">
                    <label for="buktidp">Bukti</label>
                    <input class="form-control @error('buktidp') is-invalid @enderror" type="file" id="buktidp" name="buktidp">
                    @error('buktidp')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>

                <div>
                  <input hidden type="text" value="{{ $kum->id }}" id="kum_id" name="kum_id">
                </div>
                
                <div class="col-md m-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <script>
                var selectElem = document.getElementById('komponenpenunjang_id');
                selectElem.addEventListener('change', function() {
                var dataKum = this.options[this.selectedIndex].getAttribute('data-kum');
                document.getElementById('angkakredit_dp').value = dataKum;
                });
                </script>
            </form>
          </div>

          <table class="table">
            <thead>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal Pelaksanaan</th>
                <th>Angka Kredit</th>
                <th>Instansi</th>
                <th>Kedudukan</th>
                <th>Bukti</th>
                <th>Aksi</th>
            </thead>
    
            @foreach ($dokumenpenunjang as $dp)
              <tbody>
                      <td></td>
                      <td>{{ $dp->namakegiatan_dp }}</td>
                      <td>{{ $dp->tanggal_pelaksanaan_dp}}</td>
                      <td>{{ $dp->angkakredit_dp }}</td>
                      <td>{{ $dp->instansi_dp }}</td>
                      <td>{{ $dp->kedudukan_dp}}</td>
                      <td><a href="/buktidp/{{ $dp->buktidp }}" target="_blank" class="btn btn-warning">Lihat File</a></td>         
                      <td>
          
                        <div class="modal fade" id="pelaksanaan_dp_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Penelitian</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                                    <div class="modal-body">
                                      <form method="POST" action="{{route('unsurdp.update', $dp->id)}}" enctype="multipart/form-data" >
                                        @csrf
                                        @method('PUT')
                                
                                        <div class="form-group row">
                                            <div class="col-md m-3">
                                                <label for="namakegiatan_dp">Nama Kegiatan</label>
                                                <input type="text" class="form-control" id="namakegiatan_dp" name="namakegiatan_dp">
                                            </div>
                                        </div>
                        
                                        <div class="form-group ">
                                          <div class="col-md m-3">
                                            <label for="komponen">Komponen Penunjang</label>
                                            <select class="form-control" id="komponenpenunjang_id" name="komponenpenunjang_id">
                                                <option>Pilih Komponen Penunjang</option>
                                                @foreach ($komponendokumenpenunjang as $dp)
                                                    <option class="" value="{{$dp->id}}" data-kum ="{{$dp->angkakreditmax}}" title="{{$dp->komponenkegiatan}}">{{Str::limit($dp->komponenkegiatan,100)}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                        </div>
                                
                                        <div class="form-group row">
                                            <div class="col-md m-3">
                                                <label for="kedudukan_dp">Kedudukan</label>
                                                <input type="text" class="form-control" id="kedudukan_dp" name="kedudukan_dp">
                                            </div>
                                
                                
                                            <div class="col-md m-3">
                                                <label for="instansi_dp">Instansi</label>
                                                <input  type="text" class="form-control" id="instansi_dp" name="instansi_dp">
                                            </div>
                                        </div>
                                
                                
                                        <div class="form-group row">
                                            <div class="col-md m-3">
                                                <label for="tanggal_pelaksanaan_dp">Tanggal Pelaksanaan</label>
                                                <input type="date" class="form-control" id="tanggal_pelaksanaan_dp" name="tanggal_pelaksanaan_dp">
                                            </div>
                                            <div class="col-md m-3">
                                                <label for="angkakredit_dp">Angka Kredit</label>
                                                <input readonly type="integer" class="form-control" id="angkakredit_dp" name="angkakredit_dp">
                                            </div>
                                        </div>
                                
                                        
                                        <div class="form-group ">
                                          <div class="com-md m-3">
                                            <label for="buktidp">Bukti</label>
                                            <input class="form-control @error('buktidp') is-invalid @enderror" type="file" id="buktidp" name="buktidp">
                                            @error('buktidp')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                          </div>
                                        </div>
                                        <div class="col-md m-3 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                        
                                        <script>
                                        var selectElem = document.getElementById('komponenpenunjang_id');
                                        selectElem.addEventListener('change', function() {
                                        var dataKum = this.options[this.selectedIndex].getAttribute('data-kum');
                                        document.getElementById('angkakredit_dp').value = dataKum;
                                        });
                                
                                
                                        </script>
                                      </form>
                                    </div>
                            </div>
                          </div>
                        </div>
                          <a href="{{ route('unsurdp.edit', $dp->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pelaksanaan_dp_Modal">ubah</a>
                          <form action="{{ route('unsurdp.destroy', $dp->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
                        </form>
    
                      </td>
                      </td>
              </tbody>
            @endforeach  
        </table>
        </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@endsection




