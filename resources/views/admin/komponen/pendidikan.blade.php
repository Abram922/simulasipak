@extends('.layouts.admin')
@section('content1')

<h1>Pendidikan</h1>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Komponen Pendidikan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <!-- Card Body -->
            <form action="{{ route('komponen-pendidikan.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="institusi">Jenis Pelaksanaan</label>
                            <input required type="text" class="form-control"  id="jenispelaksanaan" name="jenispelaksanaan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="institusi">Keterangan Batas Pengakuan</label>
                            <input required type="text" class="form-control"  id="batas_maksimal_diakui" name="batas_maksimal_diakui">
                        </div>
                        <div class="col-md m-3">
                            <label for="institusi">Keterangan Bukti Kegiatan</label>
                            <input required type="text" class="form-control"  id="bukti_kegiatan" name="bukti_kegiatan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="institusi">Besaran Angka Kredit</label>
                            <input required type="number" class="form-control"  id="angka_kredit" name="angka_kredit">
                        </div>
                        <div class="col-md m-3">
                            <label for="institusi">Hanya Untuk Jenjang Lektor ?</label>
                            <select class="form-control" name="Lektor_Kepala" id="Lektor_Kepala">
                                <option>Pilih</option>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                                <!-- Tambahkan opsi lain sesuai kebutuhan -->
                            </select>
                            
                        </div>

                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Komponen Pendidikan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>

                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                    <table class="table">
      <thead>
          <th>No</th>
          <th>Jenis Pelaksanaan</th>
          <th>Keterangan Batas Pengakuan</th>
          <th>Keterangan Bukti Kegiatan</th>
          <th>Besaran Angka Kredit</th>
          <th>Hanya Untuk Jenjang Lektor</th>
          <th>Aksi</th>
      </thead>

      @foreach ($komponenpendidikan as $pd)
      <tbody>
              <td></td>
              <td>{{ $pd->jenispelaksanaan }}</td>
              <td>{{ $pd->batas_maksimal_diakui }}</td>   
              <td>{{ $pd->bukti_kegiatan }}</td>
                <td>{{ $pd->angka_kredit }}</td>  
                <td>{{ $pd->Lektor_Kepala }}</td>     

              <td>

                
                  <a href="{{ route('komponen-pendidikan.edit', $pd->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modals_kpmodals_kp_{{ $pd->id }}">ubah</a>
                  <form action="{{ route('komponen-pendidikan.destroy', $pd->id)}}" method="POST">
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
</div>
    
<div class="modal fade" id="modals_kp_{{ $pd->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Komponen Pendidikan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <form method="POST" action="{{route('komponen-pendidikan.update', $pd->id)}}" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <div class="col-md m-3">
                                <label for="institusi">Jenis Pelaksanaan</label>
                                <input required type="text" class="form-control"  id="jenispelaksanaan" name="jenispelaksanaan">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <div class="col-md m-3">
                                <label for="institusi">Keterangan Batas Pengakuan</label>
                                <input required type="text" class="form-control"  id="batas_maksimal_diakui" name="batas_maksimal_diakui">
                            </div>
                            <div class="col-md m-3">
                                <label for="institusi">Keterangan Bukti Kegiatan</label>
                                <input required type="text" class="form-control"  id="bukti_kegiatan" name="bukti_kegiatan">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <div class="col-md m-3">
                                <label for="institusi">Besaran Angka Kredit</label>
                                <input required type="number" class="form-control"  id="angka_kredit" name="angka_kredit">
                            </div>
                            <div class="col-md m-3">
                                <label for="institusi">Hanya Untuk Jenjang Lektor ?</label>
                                <select class="form-control" name="Lektor_Kepala" id="Lektor_Kepala">
                                    <option>Pilih</option>
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                                
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
@endsection