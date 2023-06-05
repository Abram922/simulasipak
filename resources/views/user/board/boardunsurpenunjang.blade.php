@extends('.layouts.user')
@section('content1')
<br>
<br>
<br>
<br>

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
            <th>Nama Kegiatan</th>
            <th>Instansi</th>
            <td>Jenis Pelaksanaan</td>
            <th>Kedudukan</th>
            <th>Tanggal Pelaksanaan</th>
            <th>Angka Kredit</th>
            <th>Bukti</th>
            <th>Aksi</th>
        </thead>
        @foreach ($dokumenpenunjang as $dp)
          <tbody>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $dp->namakegiatan_dp }}</td>
                  <td>{{ $dp->instansi_dp }}</td>
                  <td>{{ $dp->komponendp->komponenkegiatan }}</td>
                  <td>{{ $dp->kedudukan_dp}}</td>                  
                  <td>{{ $dp->tanggal_pelaksanaan_dp}}</td>
                  <td>{{ $dp->angkakredit_dp }}</td>

                  <td>
                    <a href="/bukti_unsur_penunjang/{{ $dp->buktidp }}" target="_blank" class="btn btn-warning">Lihat File</a>
                    <a href="/bukti_unsur_penunjang/{{ $dp->buktidp }}" download target="_blank" class="btn btn-info">Unduh File</a>
                  </td>

                  <td>
      
                    <div class="modal fade" id="pelaksanaan_dp_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Penelitian</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                                <div class="modal-body">
                                  <form method="POST" action="{{route('doumenpenunjang.update', $dp->id)}}" enctype="multipart/form-data" >
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
                    

                                  </form>
                                </div>
                        </div>
                      </div>
                    </div>
                      <a href="{{ route('doumenpenunjang.edit', $dp->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pelaksanaan_dp_Modal">ubah</a>
                      <form action="{{ route('doumenpenunjang.destroy', $dp->id) }}" method="POST">
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