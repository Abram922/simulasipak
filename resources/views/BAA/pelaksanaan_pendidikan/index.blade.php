  @extends('layouts.baa')
  @section('content1')

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

  <div class="col-xl-12 col-lg-12" style="margin-top: 30px">
    <p>klik disini untuk <a href="{{ asset('aset_web/Template Simulasi PAK EXCEL.xlsx') }}" target="_blank" download>download template</a></p>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">PENGAJARAN</h6>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                      <form method="POST" action="{{ route('import_baa') }}"  enctype="multipart/form-data">
                        @csrf
                        <input hidden type="text" class="form-control"  id="jenislampiran" name="jenislampiran" value="sk" >     
                        <input hidden type="text" value="1" name="id_kum">
                        <input hidden type="text" value="IT DEL" name="instansi">
                        <div class="col-md m-3">
                          <label for="semester">Semester</label>
                          <select class="form-control"  name="id_semester">
                              <option>Pilih Semester</option>
                              @foreach ($semester as $s)
                                  <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="col-md m-3">
                              <label for="file">SK</label>
                              <input class="form-control @error('file') is-invalid @enderror" type="file"  name="file">
                              @error('file')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                              @enderror
                        </div>
                        <div class="col-md m-3">
                              <label for="data">Data</label>
                              <input class="form-control @error('data') is-invalid @enderror" type="file"  name="data">
                              @error('data')
                                  <div class="invalid-feedback">
                                      {{$message}}
                                  </div>
                              @enderror
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-success" type="submit">Kirim</button>
                  </div>                      
                      </form>


                </div>
              </div>
            </div>

            <div class="dropdown no-arrow">
              <a href="{{ route('baa_pelaksanaan_pendidikan') }}" class="btn btn-primary">Tambah</a>
                <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                  Import
                </a>
                <div class="btn-group">
                  <ul class="dropdown-menu">
                    <select class="form-control" id="id_semester" name="id_semester" required>
                      <option value="">Pilih Semester</option>
                      @php
                        $user = App\Models\User::where('role', 2);
                      @endphp
                      @foreach ($user as $s)
                        <option class="" value="{{$s->id}}" title="{{$s->name}}">{{Str::limit($s->name,100)}}</option>
                      @endforeach
                    </select>

                  </ul>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="col-xl-12 col-lg-12" style="margin-top: 30px">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Melaksanakan perkuliahan Tutorial dan membimbing, Menguji serta menyelenggarakan pendidikan di laboratorium, praktek perguruan bengkel/studio, kebun percobaan, teknologi pengajaran dan praktek lapangan</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
            </div>
        </div>
        @php
          $previousSemester = null;
        @endphp
      
          @foreach ($pengajaranBySemester as $semester => $pengajarans)

        <table class="table m-3" >
          <thead>
            <th>No</th>
            {{-- <th>Instansi</th> --}}
            <th>Kode-Mata Kuliah</th>
            <th>Kelas</th>
            <th>SKS</th>
            <th>Volume Dosen</th>
            <th>Angka Kredit</th>
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
              <td>{{ $gose->kode_matakuliah }} - {{ $gose->matakuliah }}</td>
              <td>{{ $gose->nama_kelas_pengajaran }}</td>
              <td>{{ $gose->sks_pengajaran }}</td>
              <td>{{ $gose->volume_dosen_pengajar }}</td>
              @php
                $v_dosen = $gose->volume_dosen_pengajar;
                $sks = $gose->sks_pengajaran;
                $angkakredit_baa = (1 / $v_dosen) * $sks;
              @endphp
            <td>{{ $gose->jumlah_angka_kredit ?? $angkakredit_baa }}</td>

              <td>
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
                              <label for="instansi">Dosen Koordinator</label>
                              <input type="text" class="form-control" id="instansi" name="instansi" value="{{ $gose->userdosen1->name ?? $gose->dosen_1 }}">
                            </div>
                            <div class="col-md m-3">
                              <label for="instansi">Dosen II</label>
                              <input type="text" class="form-control" id="instansi" name="instansi" value="">
                            </div>
                            <div class="col-md m-3">
                              <label for="instansi">Dosen III</label>
                              <input type="text" class="form-control" id="instansi" name="instansi" value="">
                            </div>
                          </div>
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

                            
                <a href="{{ route('pengajaran.edit', $gose->id) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-pengajaran-{{ $gose->id }}">Ubah</a>
                <form action="{{ route('pengajaran.destroy', $gose->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                </form>
              </td>

              <div class="m-3">
                {{-- <p><b>Dosen I  :</b>{{ $gose->relasidosen1->name }}</p>
                <p><b>Dosen II  :</b> {{ $gose->relasidosen2->name }}</p>
                <p><b>Dosen III  :</b>{{ $gose->relasidosen3->name }}</p> --}}
              </div>
            </tbody>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
      
          @endforeach


        </table>
    
    
        @endforeach
    </div>
  </div>
    <div class="col-lg-10">
      
      <p></p>
      <br>
      <br>
    

    </div>





  @endsection






