@extends('.layouts.user')
@section('content1')


<br>
<br>
<br>
<br>




<div style="background-color: #F9F9FE">
  <div class="col-lg-10 mx-auto">
    
    <p>Melaksanakan perkuliahan Tutorial dan membimbing, Menguji serta menyelenggarakan pendidikan di laboratorium, praktek perguruan bengkel/studio, kebun percobaan, teknologi pengajaran dan praktek lapangan</p>
    <br>
    <br>
  
    @php
    $previousSemester = null;
    @endphp
  
    @foreach ($pengajaranBySemester as $semester => $pengajarans)
  
    <table class="table">
      <thead>
        <th>No</th>
        <th>Semester</th>
        <th>Status</th>
        <th>Instansi</th>
        <th>Kode-Mata Kuliah</th>
        <th>Kelas</th>
        <th>SKS</th>
        <th>Volume Dosen</th>
        <th>Angka Kredit</th>
        <th>File</th>
        <th>Aksi</th>
      </thead>
      @foreach ($pengajarans as $gose)
        @if ($previousSemester !== $gose->xsemester->semester)
          @php
            $previousSemester = $gose->xsemester->semester;
          @endphp
          <h2>{{ $gose->xsemester->semester }}</h2>
        @endif
        <tbody>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $gose->xsemester->semester }}</td>

          <td>
            <b id="status{{ $gose->id }}" style="color: {{ $gose->status == 1 ? 'green' : 'red' }}">
              {{ $gose->status == 1 ? 'Beban Terhitung' : 'Beban Tidak Terhitung' }}
            </b>
            
          </td>

          <td>{{ $gose->instansi }}</td>
          <td>{{ $gose->kode_matakuliah }} - {{ $gose->matakuliah }}</td>
          <td>{{ $gose->nama_kelas_pengajaran }}</td>
          <td>{{ $gose->sks_pengajaran }}</td>
          <td>{{ $gose->volume_dosen_pengajar }}</td>
          <td>{{ $gose->jumlah_angka_kredit }}</td>
          <td>
            <a href="/file/{{ $gose->file }}" target="_blank" class="btn btn-warning">Lihat</a>
            <a href="/file/{{ $gose->file }}" target="_blank" download class="btn btn-info">Download</a>
          </td>
          <td>

            <a href="{{ route('pengajaran.edit', $gose->id) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-pengajaran-{{ $gose->id }}">Ubah</a>
            <form action="{{ route('pengajaran.destroy', $gose->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </form>
          </td>
        </tbody>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <div class="modal fade" id="modal-pengajaran-{{ $gose->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pelaksanaan Pendidikan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ route('pengajaran.update', $gose->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <input type="text" hidden class="form-control" id="id_kum" name="id_kum" value="{{ $gose->id_kum }}">
                  <div class="form-group row">
                    <div class="col-md m-3">
                      <label for="instansi">Instansi</label>
                      <input type="text" class="form-control" id="instansi" name="instansi" value="{{ $gose->instansi }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md m-3">
                      <label for="semester">Semester</label>
                      <select class="form-control" id="id_semester" name="id_semester" required>
                        <option value="">Pilih Semester</option>
                        @php
                          $semester = App\Models\semester::all();
                        @endphp
                        @foreach ($semester as $s)
                          <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                        @endforeach
                      </select>
                      <div id="semesterAlert" class="alert alert-danger mt-2 d-none">Pilih salah satu semester.</div>
                    </div>
                    <div class="col-md m-3">
                      <label for="kode_matakuliah">Kode Mata Kuliah</label>
                      <input type="text" class="form-control" id="kode_matakuliah" name="kode_matakuliah" value="{{ $gose->kode_matakuliah }}" >
                    </div>                    
                  </div>
                  <div class="form-group row">

                    <div class="col-md m-3">
                      <label for="matakuliah">Nama Mata Kuliah</label>
                      <input type="text" class="form-control" id="matakuliah" name="matakuliah" value="{{ $gose->matakuliah }}">
                    </div>
                    <div class="col-md m-3">
                      <label for="nama_kelas_pengajaran">Nama Kelas</label>
                      <input type="text" class="form-control" id="nama_kelas_pengajaran" name="nama_kelas_pengajaran" value="{{ $gose->nama_kelas_pengajaran }}">
                    </div>                    
                  </div>
                  <div class="form-group row">

                    <div class="col-md m-3">
                      <label for="volume_dosen_pengajar">Volume Dosen</label>
                      <input type="number" class="form-control x" id="volume_dosen_pengajar" name="volume_dosen_pengajar" onkeyup="sum1()" value="{{ $gose->volume_dosen_pengajar }}">
                    </div>
                    <div class="col-md m-3">
                      <label for="sks_pengajaran">SKS Pengajaran</label>
                      <input type="number" class="form-control x" id="sks_pengajaran" name="sks_pengajaran" onkeyup="perkalian()" value="{{ $gose->sks_pengajaran }}">
                    </div>                    
                  </div>
                  <div class="form-group row">

                    <div class="col-md m-3">
                      <label for="nama_kelas_pengajaran">Beban Terhitung </label>
                      <input name="status" id="status" type="checkbox" {{ $gose->status ? 'checked' : '' }}>
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
        <script>
          document.getElementById('updateForm').addEventListener('submit', function(event) {
            // Mendapatkan nilai yang dipilih pada dropdown semester
            var semester = document.getElementById('id_semester').value;
            // Mengecek apakah nilai semester kosong atau tidak
            if (!semester) {
              // Menampilkan alert jika semester tidak dipilih
              document.getElementById('semesterAlert').classList.remove('d-none');
              // Mencegah pengiriman formulir
              event.preventDefault();
            } else {
              // Semua isian telah diisi, formulir bisa dikirim
              document.getElementById('semesterAlert').classList.add('d-none');
            }
          });
        </script>        
      @endforeach
    </table>


    @endforeach
  </div>
</div>


<br>
<br>







<div class="col-lg-10 mx-auto">

  <p>Melaksanakan perkuliahan Tutorial dan membimbing, Menguji serta menyelenggarakan pendidikan di laboratorium, praktek perguruan bengkel/studio, kebun percobaan, teknologi pengajaran dan praktek lapangan</p>
  <br>
  <br>
  <table class="table">
      <thead>
          <th>No</th>
          <th>Jenis Pelaksanaan</th>
          <th>Semester</th>
          <th>Kegiatan Pendidikan dan Pengajaran</th>
          <th>Tempat/Instansi</th>
          <th>Angka Kredit</th>
          <th>File</th>
          <th>Aksi</th>
      </thead>

      @foreach ($pelaksanaan_pendidikan as $pk)
      <tbody>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pk->jenispelaksanaan->jenispelaksanaan }}</td>
              <td>{{ $pk->semester->semester}}</td>
              <td>{{ $pk->nama_kegiatan }}</td>
              <td>{{ $pk->tempat_instansi }}</td>
              <td>{{ $pk->jumlah_angka_kredit }}</td>
              <td>
                <a href="/pelaksanaanpendidikan/{{ $pk->bukti_pendidikan }}" target="_blank" class="btn btn-warning">Lihat</a>
                <a href="/pelaksanaanpendidikan/{{ $pk->bukti_pendidikan }}" target="_blank" download class="btn btn-info">Download</a>
              </td>
              <td>

                <div class="modal fade" id="modal_pelaksanaan_pendidikan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pelaksanaan Pendidikan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <form method="POST" action="{{route('unsurpelaksanaan.update', $pk->id)}}" enctype="multipart/form-data" >
                          @csrf
                          @method('PUT')


                          <div class="form-group row">
                            <div class="col-md m-3">
                                <label for="tempat_instansi">Instansi</label>
                                <input type="text" class="form-control" id="tempat_instansi" name="tempat_instansi" value="{{ $pk->tempat_instansi }}">
                            </div>       
                            
                            <div class="col-md m-3">
                              <label for="semester">Semester</label>
                              <select class="form-control" id="id_semester" name="id_semester" required>
                                <option value="">Pilih Semester</option>
                                @php
                                  $semester = App\Models\semester::all();
                                @endphp
                                @foreach ($semester as $s)
                                  <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                                @endforeach
                              </select>
                              <div id="semesterAlert" class="alert alert-danger mt-2 d-none">Pilih salah satu semester.</div>
                            </div>

                          </div>

                          <div class="form-group row">
                            <div class="col-md m-3">
                              <label for="semester">Jenis Pelaksanaan</label>
                              <select class="form-control idjenispelaksanaan" id="idjenispelaksanaan" name="idjenispelaksanaan">
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
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ $pk->nama_kegiatan }}">
                              </div>

                              <div class="col-md m-3">
                                  <label for="bukti">Bukti</label>
                                  <input class="form-control @error('bukti_pendidikan') is-invalid @enderror" type="file" id="bukti_pendidikan"  name="bukti_pendidikan">
                                  @error('bukti_pendidikan')
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
                  <a href="{{ route('pelaksanaanpendidikan.edit', $pk->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_pelaksanaan_pendidikan">ubah</a>
                  <form action="{{ route('pelaksanaanpendidikan.destroy', $pk->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
                  </form>

              </td>
    

      </tbody>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusElement = document.getElementById('status{{ $loop->iteration }}');
            var status = parseInt(statusElement.innerHTML);
    
            if (status === 1) {
                statusElement.innerHTML = 'Terhitung';
                statusElement.style.color = 'blue';
            } else {
                statusElement.innerHTML = 'Tidak Terhitung';
                statusElement.style.color = 'red';
            }
        });
    </script>
    
      @endforeach
      

    </table>
  </div>
</div>


@endsection
