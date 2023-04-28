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
          <button class="nav-link" id="pelaksanaanpendidikan-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpendidikan-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpendidikan-tab-pane" aria-selected="false">Pelaksanaan Pendidikan</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pelaksanaanpenelitian-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpenelitian-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpenelitian-tab-pane" aria-selected="false">Pelaksanaan Penelitian</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pelaksanaanpengabdian-tab" data-bs-toggle="tab" data-bs-target="#pelaksanaanpengabdian-tab-pane" type="button" role="tab" aria-controls="pelaksanaanpengabdian-tab-pane" aria-selected="false">Pelaksanaan Pengabdian Masyarakat</button>
        </li> 
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="unsur-tab" data-bs-toggle="tab" data-bs-target="#unsur-tab-pane" type="button" role="tab" aria-controls="unsur-tab-pane" aria-selected="false">Unsur Penunjang</button>
        </li>
      </ul>
      <div class="tab-content mb-4" id="myTabContent">
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
        
                  @foreach ($pendidikan as $p)
                  <tbody>
                          <td></td>
                          <td>{{ $p->institusi }}</td>
                          <td>{{ $p->strata->strata }}</td>
                          <td><a href="/buktipendidikan/{{ $p->bukti }}" target="_blank" class="btn btn-warning">Lihat File</a></td>
                          <td>{{ $p->jumlahAngkaKredit }}</td>                
                          <td>
        
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pendidikan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ route('pendidikan.update', $p->id) }}" method="POST">
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
                              <a href="{{ route('pendidikan.edit', $p->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ubah</a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
        
                          </td>
                  </tbody>
                  @endforeach
                  
        
                </table>
              </div>
            </div>
        </div>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pendidikan</h1>
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

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>                                        
                                      </form>
                                    </div>

                                </form>                                  
                  
                            </div>
                          </div>
                        </div>
                          <a href="{{ route('pelaksanaanpendidikan.edit', $pk->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pelaksanaan_pendidikan_Modal">ubah</a>
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
    
                      </td>
              </tbody>
              @endforeach
              
    
            </table>
          </div>


          </div>
        </div>
        <div class="tab-pane fade" id="pelaksanaanpenelitian-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpenelitian-tab" tabindex="0">...Ini Penelitian... <br>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</div>
        <div class="tab-pane fade" id="pelaksanaanpengabdian-tab-pane" role="tabpanel" aria-labelledby="pelaksanaanpengabdian-tab" tabindex="0">....Ini Pengabdian.... <br>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</div>
        <div class="tab-pane fade" id="unsur-tab-pane" role="tabpanel" aria-labelledby="unsur-tab" tabindex="0">.....Ini Unsur..... <br>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</div>
      </div>



      <div class="col" style="margin-top:110px">
          <div class="row mx-auto">
              <div class="col">
                  <div class="card" style="width: 215px;border:none">
                        </span>
                      <img src="{{asset('aset_web/logopendidikan.png')}}" class="card-img-top img-responsive" alt="...">
                      <div class="text-center">
                          <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pendidikan dan Pengajaran</a>
                      </div>
                    </div>
              </div>
              <div class="col">
                  <div class="card" style="width: 215px;border:none" >
                      <img src="{{asset('aset_web/logopengabdian.png')}}" class="card-img-top img-responsive" alt="...">
                      <div class="text-center">
                          <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pengabdian</a>
                      </div>
                    </div>
              </div>
              <div class="col">
                  <div class="card" style="width: 215px;border:none">
                      <img src="{{asset('aset_web/logopenelitian.png')}}" class="card-img-top img-responsive" alt="...">
                      <div class="text-center">
                          <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Penelitian</a>
                      </div>
                    </div>
              </div>
              <div class="col">
                  <div class="card" style="width: 215px;border:none">
                      <img src="{{asset('aset_web/logodokumenpenunjang.png')}}" class="card-img-top img-responsive" alt="...">
                      <div class="text-center">
                          <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Dokumen Penunjang</a>
                      </div>
                        
                    </div>
              </div>
              <div class="col">
                  <div class="card" style="width: 215px;border:none">
                      <img src="{{asset('aset_web/logolampiran.png')}}" class="card-img-top img-responsive" alt="...">
                      <div class="text-center">
                          <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Lampiran</a>
                      </div>
                    </div>
              </div>
          </div>
          <br>
          <br>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@endsection