
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/universal.css') }}">

    <style>
      .sticky-nav {
        position: sticky;
        top: 0;
        z-index: 100;
      }
    </style>
    
    <title>
        @yield('title')
    </title>
        <!-- Custom fonts for this template-->
        <link href="{{URL::asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    
        <!-- Custom styles for this template-->
        <link href="{{URL::asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        @livewireStyles    
  </head>
  <body>
    @include('.layouts.navbar', ['containerClass' => 'col-md-10 mx-auto'])
  
       
        @yield('content1')

        <div class="form-check form-switch">
          <input class="form-check-input"  wire:model.lazy="status" type="checkbox" role="switch" @if($status) checked @endif>
      </div>
      
        <br>
        <div class="container " style="background-color: #F9F9FE">
        @yield('content2')
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>



    @livewireScripts
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>



















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

              @livewire('toggle-button', ['model' => $gose, 'field' => 'status'], key($gose->id))

              <b id="status{{ $loop->iteration }}" style="color: blue;">{{ $gose->status }}</b>



          </td>

          <td>{{ $gose->instansi }}</td>
          <td>{{ $gose->kode_matakuliah }} - {{ $gose->matakuliah }}</td>
          <td>{{ $gose->nama_kelas_pengajaran }}</td>
          <td>{{ $gose->sks_pengajaran }}</td>
          <td>{{ $gose->volume_dosen_pengajar }}</td>
          <td>{{ $gose->jumlah_angka_kredit }}</td>
          <td>
            <a href="/pelaksanaanpendidikan/{{ $gose->bukti_pendidikan }}" target="_blank" class="btn btn-warning">Lihat</a>
            <a href="/pelaksanaanpendidikan/{{ $gose->bukti_pendidikan }}" target="_blank" download class="btn btn-info">Download</a>
          </td>
          <td>
            <!-- Modal -->
            <div class="modal fade" id="modal-pengajaran-{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <div class="form-group row">
                        <div class="col-md m-3">
                          <label for="instansi">Instansi</label>
                          <input type="text" class="form-control" id="instansi" name="instansi">
                        </div>
                        <div class="col-md m-3">
                          <label for="semester">Semester</label>
                          <select class="form-control" id="id_semester" name="id_semester">
                            <option>Pilih Semester</option>
                            @php
                              $semester = App\Models\semester::all();
                            @endphp
                            @foreach ($semester as $s)
                              <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md m-3">
                          <label for="kode_matakuliah">Kode Mata Kuliah</label>
                          <input type="text" class="form-control" id="kode_matakuliah" name="kode_matakuliah">
                        </div>
                        <div class="col-md m-3">
                          <label for="matakuliah">Nama Mata Kuliah</label>
                          <input type="text" class="form-control" id="matakuliah" name="matakuliah">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md m-3">
                          <label for="nama_kelas_pengajaran">Nama Kelas</label>
                          <input type="text" class="form-control" id="nama_kelas_pengajaran" name="nama_kelas_pengajaran">
                        </div>
                        <div class="col-md m-3">
                          <label for="volume_dosen_pengajar">Volume Dosen</label>
                          <input type="number" class="form-control x" id="volume_dosen_pengajar" name="volume_dosen_pengajar" onkeyup="sum1()">
                        </div>
                        <div class="col-md m-3">
                          <label for="sks_pengajaran">SKS Pengajaran</label>
                          <input type="number" class="form-control x" id="sks_pengajaran" name="sks_pengajaran" onkeyup="perkalian()">
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
            <a href="{{ route('pengajaran.edit', $gose->id) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-pengajaran-{{ $loop->iteration }}">Ubah</a>
            <form action="{{ route('pengajaran.destroy', $gose->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </form>
          </td>
        </tbody>
      @endforeach
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- <script>
      $(document).ready(function() {
        // Ambil semua elemen toggle switch
        var toggleSwitches = $('.toggle-switch');
      
        // Loop melalui setiap toggle switch dan tambahkan event listener
        toggleSwitches.each(function() {
          $(this).on('change', function() {
            var statusElement = $('#status' + $(this).data('id'));
            if ($(this).prop('checked')) {
              statusElement.css('color', 'blue');
              statusElement.text('terhitung');
            } else {
              statusElement.css('color', 'red');
              statusElement.text('tidak terhitung');
            }
          });
        });
      });

      

    </script> --}}

    



    
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
                <a href="" target="_blank" class="btn btn-warning">Lihat File</a>
                <a href="" target="_blank" download class="btn btn-info">Download File</a>
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
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
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
