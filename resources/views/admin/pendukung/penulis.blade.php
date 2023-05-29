@extends('layouts.admin')
@section('content1')

<h1>Penulis</h1>

<div class="row">


    <div class="col-xl-5 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Komponen Pendukung Penulis</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <form action="{{ route('penulis.store') }}" method="POST">
                @csrf
                <div class="card-body">
                        <div class="col-md m-3">
                            <label for="">Jenis Penulis</label>
                            <input required type="text" class="form-control"  id="jenispenulis" name="jenispenulis">
                        </div>
                        <div class="col-md m-3">
                            <label for="institusi">Persentase Skor</label>
                            <input required type="number" class="form-control"  id="persentase_skor" name="persentase_skor">
                        </div>
                        <div class="col-md m-3">
                            <label for="institusi">Penulis Khusus</label>
                        <select class="form-control" name="penulis_khusus" id="penulis_khusus">
                                <option>Pilih</option>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                                <!-- Tambahkan opsi lain sesuai kebutuhan -->
                            </select>
                        </div>
                        <div class="col-md m-3">
                            <label for="institusi">Note</label>
                            <input required type="text" class="form-control"  id="note" name="note">
                        </div>                        
                    

                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="col-xl-7 col-lg-7">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Komponen Pendukung Penulis</h6>
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
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Penulis</th>
                    <th scope="col">Persentase Skor</th>
                    <th scope="col">note</th>
                    <th scope="col">Penulis Khusus</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                        
                    @foreach ($penulis as $gose)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $gose->jenispenulis}}</td>
                            <td>{{ $gose->persentase_skor}}</td>
                            <td>{{ $gose->note}}</td>
                            <td>{{ $gose->penulis_khusus}}</td>
                            <td>
                            <a id="editpendidikan" href="#" class="btn btn-warning ml-2" data-toggle="modal" data-target="#editpenulis_{{ $gose->id }}">edit</a>
                            <a id="hapuspendidikan" href="#" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapuspenulis_{{ $gose->id }}">hapus</a>
                        </td>

                        
                        <div class="modal fade" id="hapuspenulis_{{ $gose->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus jenis penulis ini?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Peringatan: Data ini akan hilang ketika menekan tombol hapus</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                        <button onclick="event.preventDefault(); document.getElementById('hapus{{ $gose->id }}').submit();">hapus</button>
                                    </div>
                                    <form id="hapus{{ $gose->id }}" action="{{ route('penulis.destroy', $gose->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                        <div class="modal fade" id="editpenulis_{{ $gose->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Komponen Penulis ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <form action="{{ route('penulis.update', $gose->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Jenis Penulis</label>
                                                        <input required type="text" class="form-control"  id="jenispenulis" name="jenispenulis">
                                                    </div>
                                                </div>
                            
                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="institusi">Persentase Skor</label>
                                                        <input required type="text" class="form-control"  id="persentase_skor" name="persentase_skor">
                                                    </div>

                 
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="institusi">Penulis Khusus</label>
                                                        <input required type="text" class="form-control"  id="penulis_khusus" name="penulis_khusus">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="institusi">Note</label>
                                                        <input required type="number" class="form-control"  id="note" name="note">
                                                    </div>                                                           
                                                </div>
                                        </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                                        <button class="btn btn-primary" type="submit">submit</button>
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
