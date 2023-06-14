@extends('layouts.baa')
@section('content1')

@php
$id = 1;
@endphp

<a href="{{ route('pengajaran', ['id' => $id])}}" class="btn btn-warning">Kembali</a>


<div class="col-lg-10   " style="margin-top: 30px">
    <form action="{{ route('store_baa') }}" method="POST"  enctype="multipart/form-data" id="myForm" >
      @csrf
        <div id="inputFields" class = "inputFields" >
            <div class="input-group ">
              <div class="col-lg-10 ">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <h3><b>Input Data Pengajaran</b></h3>
                  </div>
                </div>
                <br>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Melaksanakan Perkuliahan</h6>
                </div>
                <div class="card-body">

                    <div class="form-group row">
                      <div class="col-md m-3">
                          <label for="instansi">Instansi</label>
                          <input type="text" class="form-control" name="inputs[0][instansi]">
                      </div>       
                      
                      <div class="col-md m-3">
                        <label for="semester">Semester</label>
                        <select class="form-control" name="inputs[0][id_semester]" required>
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

                    </div>
                    <div class="form-group row">
                      <div class="col-md m-3">
                          <label for="kode_matakuliah">Kode Matakuliah</label>
                          <input type="text" class="form-control" name="inputs[0][kode_matakuliah]" required>
                      </div>

                      <div class="col-md m-3">
                        <label for="matakuliah">Nama Mata Kuliah</label>
                        <input type="text" class="form-control"  name="inputs[0][matakuliah]" required>
                      </div>
                    </div>
          
                    <div class="form-group row">
                        <div class="col-md m-3">
                          <label for="nama_kelas_pengajaran">Nama Kelas</label>
                          <input type="text" class="form-control"  name="inputs[0][nama_kelas_pengajaran]" required>
                        </div>

                        <div class="col-md m-3">
                            <label for="volume_dosen_pengajar">Volume Dosen</label>
                            <input  type="number" class="form-control x"  name="inputs[0][volume_dosen_pengajar]" onkeyup="sum1()" required>
                        </div>

                        <div class="col-md m-3">
                                <label for="sks_pengajaran">SKS</label>
                                <input  type="number" class="form-control x"  name="inputs[0][sks_pengajaran]" onkeyup="perkalian()" required>
                        </div>     
                        
                    </div>

                  <div class="form-group row">
                      <div class="col-md m-3">
                        <label for="dosen1">Dosen I</label>
                        <select class="form-control" name="inputs[0][dosen1]" required>
                          <option value="">Pilih Dosen</option>
                          @foreach ($user as $s)
                            <option class="" value="{{$s->id}}" title="{{$s->name}}">{{Str::limit($s->name,100)}}</option>
                          @endforeach
                        </select>
                        <div id="semesterAlert" class="alert alert-danger mt-2 d-none">Pilih salah satu semester.</div>
                      </div>

                      <div class="col-md m-3">
                        <label for="dosen2">Dosen II</label>
                        <select class="form-control" name="inputs[0][dosen2]" required>
                          <option value="">Pilih Dosen</option>
                          @foreach ($user as $s)
                            <option class="" value="{{$s->id}}" title="{{$s->name}}">{{Str::limit($s->name,100)}}</option>
                          @endforeach
                        </select>
                        <div id="semesterAlert" class="alert alert-danger mt-2 d-none">Pilih salah satu semester.</div>
                      </div>

                      <div class="col-md m-3">
                        <label for="dosen3">Dosen III</label>
                        <select class="form-control" name="inputs[0][dosen3]" required>
                          <option value="">Pilih Dosen</option>
                          @foreach ($user as $s)
                            <option class="" value="{{$s->id}}" title="{{$s->name}}">{{Str::limit($s->name,100)}}</option>
                          @endforeach
                        </select>
                        <div id="semesterAlert" class="alert alert-danger mt-2 d-none">Pilih salah satu semester.</div>
                      </div>
                  </div>

                    <div class="form-group row">
                      <div class="col-md m-3 ">
                        <label for="sk">SK Pelaksanaan Pendidikan</label>
                        <input class="form-control @error('sk') is-invalid @enderror" type="file" name="inputs[0][sk]" >
                        @error('sk')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                    </div>


                    <hr>
                    Input Data Pengajaran adalah kumpulan informasi yang diberikan atau dimasukkan ke dalam suatu sistem atau proses untuk keperluan perhitungan angka kredit aktifitas pengajaran. Data ini berisi instansi,semester, kode mataa kuliah, nama mata kuliah, nama kelas, volume dosen, sks dan file yang digunakan sebagai acuan dalam mengelola angka kredit dosen.
                  </div>
              </div>                    
            </div>
        </div>
        <button id="addButton" class="btn btn-primary" type="button">Tambah</button>
        <button class="btn btn-success" type="submit">Kirim</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
          var i = 0 ;              
      $(document).ready(function() {
        ++i;

          // Add new field

          $('#addButton').click(function() {
              var fieldHTML =
              '<div id="inputFields"  class = "inputFields">'+
                '<div class="input-group ">'+

                  '<div class="card shadow mb-4">'+
                        '<div class="card-header py-3">'+
                            '<div class="d-flex">'+
                              '<div class="card-header flex-grow-1 py-3 ">'+
                                '<h6 class="m-0 font-weight-bold text-primary">Melaksanakan Perkuliahan dan Membimbing </h6>'+
                              '</div>'+
                              '<div class="input-group-append">'+
                                '<button class="btn btn-outline-secondary remove-field" type="button">&times;</button>'+
                              '</div>'+
                            '</div>'+
                        '</div>'+
                    '<div class="card-body">'+

                      '<div class="form-group row">' +
                        '<div class="col-md m-3">' +
                          ' <label for="instansi">Instansi</label>' +
                          '<input type="text" class="form-control" id="instansi" name="inputs['+i+'][instansi]">' +
                        '</div>' +       
                        
                        '<div class="col-md m-3">' +
                          '<label for="semester">Semester</label>' +
                          ' <select class="form-control" id="id_semester" name="inputs['+i+'][id_semester]">' +
                              '<option>Pilih Semester</option>' +
                              '@foreach ($semester as $s)'+
                                  '<option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>' +
                              '@endforeach'+
                          '</select>' +
                        '</div>' +
                      '</div>' +

                      '<div class="form-group row">' +
                        '<div class="col-md m-3">' +
                            '<label for="kode_matakuliah">Kode Matakuliah</label>' +
                            '<input type="text" class="form-control"  name="inputs['+i+'][kode_matakuliah]">' +
                        '</div>' +

                        '<div class="col-md m-3">' +
                          '<label for="matakuliah">Nama Mata Kuliah</label>' +
                          '<input type="text" class="form-control"  name="inputs['+i+'][matakuliah]">' +
                        '</div>' +
                      '</div>' +


                      '<div class="form-group row">' +
                          '<div class="col-md m-3">' +
                            '<label for="nama_kelas_pengajaran">Nama Kelas</label>' +
                            '<input type="text" class="form-control"  name="inputs['+i+'][nama_kelas_pengajaran]">' +
                          '</div>' +

                          '<div class="col-md m-3">' +
                              '<label for="volume_dosen_pengajar">Volume Dosen</label>' +
                              '<input  type="number" class="form-control x"  name="inputs['+i+'][volume_dosen_pengajar]" onkeyup="sum()" >' +
                          '</div>' +

                          '<div class="col-md m-3">' +
                                  '<label for="sks">SKS</label>' +
                                  '<input  type="number" class="form-control x"  name="inputs['+i+'][sks_pengajaran]" onkeyup="sum()">' +
                          '</div>' +       
                                                      
                      '</div>' +

                      '<div>' +
                       
                      '</div>' +
                          
                      '<div class="form-group row">'+
                      '<div class="col-md m-3">'+
                        '<label for="dosen1">Dosen I</label>'+
                        '<select class="form-control" name="inputs['+i+'][dosen1]" required>'+
                          '<option value="">Pilih Dosen</option>'+
                          '@foreach ($user as $s)'+
                            '<option class="" value="{{$s->id}}" title="{{$s->name}}">{{Str::limit($s->name,100)}}</option>'+
                          '@endforeach'+
                        '</select>'+
                        '<div id="semesterAlert" class="alert alert-danger mt-2 d-none">Pilih salah satu semester.</div>'+
                      '</div>'+

                      '<div class="col-md m-3">'+
                        '<label for="dosen2">Dosen II</label>'+
                        '<select class="form-control" name="inputs['+i+'][dosen2]" required>'+
                          '<option value="">Pilih Dosen</option>'+
                          '@foreach ($user as $s)'+
                            '<option class="" value="{{$s->id}}" title="{{$s->name}}">{{Str::limit($s->name,100)}}</option>'+
                          '@endforeach'+
                        '</select>'+
                        '<div id="semesterAlert" class="alert alert-danger mt-2 d-none">Pilih salah satu semester.</div>'+
                      '</div>'+

                      '<div class="col-md m-3">'+
                       ' <label for="dosen3">Dosen III</label>'+
                        '<select class="form-control" name="inputs['+i+'][dosen3]" required>'+
                          '<option value="">Pilih Dosen</option>'+
                          '@foreach ($user as $s)'+
                            '<option class="" value="{{$s->id}}" title="{{$s->name}}">{{Str::limit($s->name,100)}}</option>'+
                          '@endforeach'+
                        '</select>'+
                        '<div id="semesterAlert" class="alert alert-danger mt-2 d-none">Pilih salah satu semester.</div>'+
                      '</div>'+
                  '</div>'+

                    '<div class="form-group row">'+
                      '<div class="col-md m-3 ">'+
                        '<label for="sk">SK Pelaksanaan Pendidikan</label>'+
                        '<input class="form-control @error('sk') is-invalid @enderror" type="file" name="inputs['+i+'][sk]" >'+
                        '@error('sk')'+
                            '<div class="invalid-feedback">'+
                                '{{$message}}'+
                            '</div>'+
                        '@enderror'+
                      '</div>'+
                    '</div>'+


                      '<hr>' +
                      'Input Data Pengajaran adalah kumpulan informasi yang diberikan atau dimasukkan ke dalam suatu sistem atau proses untuk keperluan perhitungan angka kredit aktifitas pengajaran. Data ini berisi instansi,semester, kode mataa kuliah, nama mata kuliah, nama kelas, volume dosen, sks dan file yang digunakan sebagai acuan dalam mengelola angka kredit dosen'+
                    '</div>'+
                  '</div>'+           
                '</div>'+
              '</div>'


            $('#inputFields').append(fieldHTML);

          });
          // Remove field
          $(document).on('click', '.remove-field', function() {
              $(this).closest('.input-group').remove();
          });
      });
    </script>

    <br>     
    <br>
</div>
@endsection






