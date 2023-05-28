@extends('layouts.admin')
@section('content1')

<h1>Semester</h1>

<div class="row">

<div class="col-xl-5 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Komponen Pendukung Semester</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <form action="{{ route('semester.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md m-3">
                            <label for="">Semester</label>
                            <input required type="text" class="form-control"  id="semester" name="semester">
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
                <h6 class="m-0 font-weight-bold text-primary">Tabel Komponen Pendukung Semester</h6>
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
                    <th scope="col">Semester</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php $i=0 ?>
            
                @foreach ($semester as $gose)
                    <tr>
                        <td>{{ ++$i  }}</td>
                        <td>{{ $gose->semester}}</td>
                        <td>
                            <a id="editpendidikan" href="#" class="btn btn-warning ml-2" data-toggle="modal" data-target="#editsemester_{{ $gose->id }}">edit</a>
                            <a id="hapuspendidikan" href="#" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapussemester_{{ $gose->id }}">hapus</a>
                        </td>
                <?php $i++ ?>

                        
                        <div class="modal fade" id="hapussemester_{{ $gose->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button onclick="event.preventDefault(); document.getElementById('hapus{{ $gose->id }}').submit();">hapus</button>
                                    </div>
                                    <form id="hapus{{ $gose->id }}" action="{{ route('semester.destroy', $gose->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                        <div class="modal fade" id="editsemester_{{ $gose->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Komponen Semester ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <form action="{{ route('semester.update', $gose->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group row">
                                                    <div class="col-md m-3">
                                                        <label for="">Semester</label>
                                                        <input type="text" class="form-control" name="semester" value="{{$gose->semester}}">
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
