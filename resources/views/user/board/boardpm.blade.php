@extends('.layouts.user')
@section('content1')

<div class="row">
  <div class="col-lg-10 mx-auto">
    <div class="jumbotron d-flex" > 
      <div class="">
          <h3>Hi,{{ Auth::user()->name }}</h3>
          <p style="">Berikut Data Pendidikan Anda</p>
      </div>
      <img src="url('{{ asset('aset_web/p1.png') }}'" alt="">
      </div>
    </div>
  </div>

  <div class="col-lg-10 mx-auto">
    <table class="table">
      <thead>
          <th>No</th>
          <th>Nama</th>
          <th>Bentuk</th>
          <th>Instansi</th>
          <th>Semester</th>
          <th>Jenis Pengabdian</th>
          <th>Angka Kredit</th>
          <th>File</th>
          <th>Aksi</th>
      </thead>

      @foreach ($pelaksanaan_pm as $pd)
      <tbody>
              <td></td>
              <td>{{ $pd->nama }}</td>
              <td>{{ $pd->bentuk }}</td>
              <td>{{ $pd->tempat_instansi }}</td>
              <td>{{ $pd->semester->semester }}</td>
              <td>{{ $pd->komponen->komponenkegiatan }}</td>
              <td>{{ $pd->angkakreditpm }}</td>
              <td>
                <a href="/bukti_unsur_utama/pelaksanaan_pm/{{ $pd->buktifisik }}" target="_blank" class="btn btn-warning">Lihat File</a>
                <a href="/bukti_unsur_utama/pelaksanaan_pm/{{ $pd->buktifisik }}" download target="_blank" class="btn btn-info">Download File</a>
              </td>  
              <td>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pengabdian Kepada Masyarakat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('pelaksanaan_pm.update', $pd->id) }}" method="POST">
                          @csrf
                          @method('PUT')

                          <div class="col-md m-3">
                            <label for="komponenpm_id">Kegiatan Pengabdian Pada Masyarakat</label>
                            <select class="form-control" id="komponenpm_id"  name="komponenpm_id">
                                <option>Pilih Tingkat Kategori Pengabdian Masyarakat</option>
                                @foreach ($komponenpm as $pm)
                                    <option class="" value="{{ $pm->id }}" data-kum-pm ="{{ $pm->angkakredit }}" title="{{$pm->komponenkegiatan}}">{{Str::limit($pm->komponenkegiatan,100)}}</option>
                                @endforeach
                            </select>
                          </div>
                        
                          <div class="form-group row">
                              <div class="col-md m-3">
                                  <label for="nama">Nama Kegiatan</label>
                                  <input type="text" class="form-control" id="nama"  name="nama" placeholder="">
                              </div>
                  
                              <div class="col-md m-3">
                                  <label for="bentuk">Bentuk</label>
                                  <input type="text" class="form-control" id="bentuk"  name="bentuk">
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
                          </div>
          
                        
                          <div class="form-group ">
                            <div class="col-md m-3">
                              <label for="bukti">Bukti</label>
                              <input class="form-control @error('buktifisik') is-invalid @enderror" id="buktifisik" type="file"  name="buktifisik">
                              @error('buktifisik')
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
                  <a href="{{ route('pelaksanaan_pm.edit', $pd->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ubah</a>
                  <form action="{{ route('pelaksanaan_pm.destroy', $pd->id) }}" method="POST">
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







@endsection