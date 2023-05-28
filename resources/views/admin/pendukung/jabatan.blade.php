@extends('layouts.admin')
@section('content1')

<h1>Jabatan</h1>

<div class="row">

<div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Komponen Pendukung Jabatan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <form action="{{ route('jabatan.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="">Jabatan</label>
                            <input required type="text" class="form-control"  id="jabatan" name="jabatan">
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-md m-3">
                                                        <label for="">Angka Kredit Kumulatif</label>
                                                        <input type="number" class="form-control" name="angkaKreditKumulatif">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Pelaksanaan Pendidikan</label>
                                                        <input type="number" class="form-control" name="pelaksanaanPendidikan" >
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Pelaksanaan Penelitian</label>
                                                        <input type="number" class="form-control" name="pelaksanaanPenelitian">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Pelaksanaan Pengabdian Masyarakat</label>
                                                        <input type="number" class="form-control" name="pelaksanaanPengabdianMasyarakat">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Penunjang</label>
                                                        <input type="number" class="form-control" name="penunjang">
                                                    </div>
                                                </div>

                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

<div class="col-xl-8 col-lg-8">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Komponen Pendukung jabatan</h6>
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
                    <th scope="col">jabatan</th>
                    <th scope="col">Angka Kredit Kumulatif</th>
                    <th scope="col">Pelaksanaan Pendidikan</th>
                    <th scope="col">Pelaksanaan Penelitian</th>
                    <th scope="col">Pelaksanaan Pengabdian Masyarakat</th>
                    <th scope="col">Penunjang</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php $i=0 ?>
            
                @foreach ($jabatan as $gose)
                    <tr>
                        <td>{{ ++$i  }}</td>
                        <td>{{ $gose->jabatan}}</td>
                        <td>{{ $gose->angkaKreditKumulatif}}</td>
                        <td>{{ $gose->pelaksanaanPendidikan}}</td>
                        <td>{{ $gose->pelaksanaanPenelitian}}</td>
                        <td>{{ $gose->pelaksanaanPengabdianMasyarakat}}</td>
                        <td>{{ $gose->penunjang}}</td>
                        <td>
                            <a id="editpendidikan" href="#" class="btn btn-warning ml-2" data-toggle="modal" data-target="#editjabatan_{{ $gose->id }}">edit</a>
                            <a id="hapuspendidikan" href="#" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapusjabatan_{{ $gose->id }}">hapus</a>
                        </td>
                <?php $i++ ?>

                        
                        <div class="modal fade" id="hapusjabatan_{{ $gose->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus Jabatan ini?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Peringatan: Data ini akan hilang ketika menekan tombol hapus</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                        <button onclick="event.preventDefault(); document.getElementById('hapus{{ $gose->id }}').submit();">hapus</button>
                                    </div>
                                    <form id="hapus{{ $gose->id }}" action="{{ route('jabatan.destroy', $gose->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                        <div class="modal fade" id="editjabatan_{{ $gose->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Komponen Jabatan ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <form action="{{ route('jabatan.update', $gose->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Jabatan</label>
                                                        <input type="text" class="form-control" name="jabatan" value="{{$gose->jabatan}}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Angka Kredit Kumulatif</label>
                                                        <input type="number" class="form-control" name="angkaKreditKumulatif" value="{{$gose->angkaKreditKumulatif}}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Pelaksanaan Pendidikan</label>
                                                        <input type="number" class="form-control" name="pelaksanaanPendidikan" value="{{$gose->pelaksanaanPendidikan}}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Pelaksanaan Penelitian</label>
                                                        <input type="number" class="form-control" name="pelaksanaanPenelitian" value="{{$gose->pelaksanaanPenelitian}}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Pelaksanaan Pengabdian Masyarakat</label>
                                                        <input type="number" class="form-control" name="pelaksanaanPengabdianMasyarakat" value="{{$gose->pelaksanaanPengabdianMasyarakat}}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Penunjang</label>
                                                        <input type="number" class="form-control" name="penunjang" value="{{$gose->penunjang}}">
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
