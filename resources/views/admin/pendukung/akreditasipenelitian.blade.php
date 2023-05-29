@extends('layouts.admin')
@section('content1')

<h1>akreditasi</h1>

<div class="row">

<div class="col-xl-5 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Komponen Pendukung akreditasi</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <form action="{{ route('akreditasipenelitian.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="">Akreditasi</label>
                            <input required type="text" class="form-control"  id="akreditasi" name="akreditasi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="">Nilai</label>
                            <input required type="number" class="form-control"  id="nilai" name="nilai">
                        </div>
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
                <h6 class="m-0 font-weight-bold text-primary">Tabel Komponen Pendukung Akreditasi</h6>
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
                    <th scope="col">Akreditasi</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
            
                @foreach ($akreditasi_penelitian as $gose)
                    <tr>
                        <td>{{ $loop->iteration  }}</td>
                        <td>{{ $gose->akreditasi}}</td>
                        <td>{{ $gose->nilai}}</td>
                        <td>
                            <a id="editpendidikan" href="#" class="btn btn-warning ml-2" data-toggle="modal" data-target="#editakreditasi_{{ $gose->id }}">edit</a>
                            <a id="hapuspendidikan" href="#" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapusakreditasi_{{ $gose->id }}">hapus</a>
                        </td>

                        
                        <div class="modal fade" id="hapusakreditasi_{{ $gose->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus Akreditasi Penelitian ini?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Peringatan: Data ini akan hilang ketika menekan tombol hapus</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                        <button onclick="event.preventDefault(); document.getElementById('hapus{{ $gose->id }}').submit();">hapus</button>
                                    </div>
                                    <form id="hapus{{ $gose->id }}" action="{{ route('akreditasipenelitian.destroy', $gose->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                        <div class="modal fade" id="editakreditasi_{{ $gose->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Komponen akreditasi ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <form action="{{ route('akreditasipenelitian.update', $gose->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Akreditasi</label>
                                                        <input type="text" class="form-control" name="akreditasi" value="{{$gose->akreditasi}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Nilai</label>
                                                        <input type="number" class="form-control" name="nilai" value="{{$gose->nilai}}">
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

<!-- @extends('layouts.admin')
@section('content1')

<div class="container">
    <button type="button" class="btn btn-primary" style="margin-bottom: 50px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
        </svg> &nbsp;Tambah Akreditasi Penelitian
    </button>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Agreditasi</th>
        <th scope="col">Nilai</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>

    <?php $i=0 ?>
    @foreach ($akreditasi_penelitian as $gose)
        <tr>
            <td>{{ ++$i  }}</td>
            <td>{{ $gose->akreditasi}}</td>
            <td>{{  $gose->nilai  }}</td>
            <td>
            <a href="" target="_blank" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg> 
            Edit</a>
            
                <a href="" target="_blank" download class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                </svg>
                Hapus</a>
            </td>
        </tr>
    @endforeach
    <?php $i++ ?>

    </tbody>
    </table>
</div>



@endsection -->
