@extends('.layouts.admin')
@section('content1')
    
<h1>Penunjang</h1>

<div class="row">


    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Komponen Penunjang</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <form action="{{ route('komponenpenunjang.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="institusi">Jenis Pelaksanaan</label>
                            <input required type="text" class="form-control"  id="komponenkegiatan" name="komponenkegiatan">
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
                            <input required type="number" class="form-control"  id="angkakreditmax" name="angkakreditmax">
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Kirim</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="col-xl-8 col-lg-8">
        <div class="card shadow mb-4">
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
                        <th>Aksi</th>
                    </thead>
            
                    @foreach ($komponenpenunjang as $pd)
                    <tbody>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pd->komponenkegiatan }}</td>
                        <td>{{ $pd->batas_maksimal_diakui }}</td>   
                        <td>{{ $pd->bukti_kegiatan }}</td>
                        <td>{{ $pd->angkakreditmax }}</td>  
                        <td>
                            <a id="editpenelitian" href="#" class="btn btn-warning ml-2" data-toggle="modal" data-target="#editpenelitian_{{ $pd->id }}">Edit</a>
                            <a id="hapuspenelitian" href="#" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapuspenelitian_{{ $pd->id }}">Hapus</a>
                        </td>

                        
                        <div class="modal fade" id="hapuspenelitian_{{ $pd->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus KUM ini?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Peringatan: Data ini akan hilang ketika menekan tombol hapus</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                        <button onclick="event.preventDefault(); document.getElementById('hapus{{ $pd->id }}').submit();">hapus</button>
                                    </div>
                                    <form id="hapus{{ $pd->id }}" action="{{ route('komponenpenunjang.destroy', $pd->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                        <div class="modal fade" id="editpenelitian_{{ $pd->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Komponen Pendidikan ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <form action="{{ route('komponenpenunjang.update', $pd->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="institusi">Jenis Pelaksanaan</label>
                                                        <input required type="text" class="form-control"  id="komponenkegiatan" name="komponenkegiatan">
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
                                                        <input required type="number" class="form-control"  id="angkakreditmax" name="angkakreditmax">
                                                    </div>
                                                </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                                        <button class="btn btn-primary" type="submit" >Kirim</button>
                                                    </div>
                                                    
                                            </form>
                                        </div>
                            </div>
                        </div>
                    </tbody>
                    @endforeach
            
                </table>
            </div>
            

            
        </div>
    </div>
</div>
    

@endsection