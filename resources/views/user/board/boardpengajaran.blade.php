@extends('.layouts.user')
@section('content1')

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

@endsection
