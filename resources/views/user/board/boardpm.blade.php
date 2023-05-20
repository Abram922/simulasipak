@extends('.layouts.user')
@section('content1')

<div class="row">
  <div class="col-md">
    <div class="jumbotron d-flex" > 
      <div class="">
          <h3>Hi,{{ Auth::user()->name }}</h3>
          <p style="">Berikut Data Pendidikan Anda</p>
      </div>
      <img src="url('{{ asset('aset_web/p1.png') }}'" alt="">
      </div>
    </div>
  </div>

  <div class="col-md">
    <table class="table">
      <thead>
          <th>No</th>
          <th>Nama</th>
          <th>Bentuk</th>
          <th>Instansi</th>
          <th>Semester</th>
          <th>Jenis Pengabdian</th>
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
              <td>{{ $pd->tempat_instansi }}</td>
              <td>{{ $pd->komponen->komponenkegiatan }}</td>
              <td>
                <a href="/bukti_unsur_utama/pendidikan/{{ $pd->buktifisik }}" target="_blank" class="btn btn-warning">Lihat File</a>
                <a href="/bukti_unsur_utama/pendidikan/{{ $pd->buktifisik }}" download target="_blank" class="btn btn-info">Download File</a>
              </td>         
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







@endsection