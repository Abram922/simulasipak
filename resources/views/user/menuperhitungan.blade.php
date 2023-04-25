@extends('.layouts.user')
@section('content1')

<br>
<br>
<br>

  

<div class="jumbotron d-flex" > 
        <div class="text-center">
            <h3>Hi,{{ Auth::user()->name }}</h3>
            <p style="">Kelola Data Kamu Disini</p>
        </div>
        <div class="ms-auto" style="background-image: url('{{ asset('aset_web/p1.png') }}')">
        </div>
        
</div>

<br>
<br>
<br>


<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold"><b>Kredit Angka Kumulatif</b></h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <form method="POST" action="{{ route('kum.store') }}" >
            @csrf
            <div class="mx-auto">

                <div class="form-group row ">
                    <div class="col-md-3 mb-4 mx-auto">
                      <label for="judul" style="display: inline-block; width: 150px;">Judul KUM:</label>
                      <input type="text" class="form-control" id="judul" name="judul" style="display: inline-block; width: 200px;">
                    </div>
                </div>
                  


                <div class="form-group row ">
                    <div class="col-md-3 mb-4 mx-auto">
                      <label for="komponen" style="display: inline-block;width: 150px;">Jabatan Saat Ini:</label>
                      <select class="form-control" id="id_jabatan_sekarang" name="id_jabatan_sekarang" style="display: inline-block; width: 200px;">
                        <option>Pilih Jabatan</option>
                        @foreach ($jabatanpref as $p)
                        <option class="" value="{{$p->id}}" data-kum ="{{$p->nilai}}" title="{{$p->jabatanpref}}">{{Str::limit($p->jabatan,100)}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="col-md-3 mb-4 mx-auto">
                      <label for="komponen" style="display: inline-block;width: 150px;">Jabatan Saat Ini:</label>
                      <select class="form-control" id="id_jabatan_dituju" name="id_jabatan_dituju" style="display: inline-block; width: 200px;">
                        <option>Pilih Jabatan</option>
                        @foreach ($jabatanafter as $px)
                            <option class="" value="{{$px->id}}" data-kum ="{{$px->nilai}}" title="{{$px->jabatanafter}}">{{Str::limit($px->jabatan,100)}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="col-md-3 mb-4 mx-auto">
                      <label for="judul" style="display: inline-block; width: 150px;">Score Dibutuhkan</label>
                      <input readonly type="text" class="form-control" id="judul" name="judul" style="display: inline-block; width: 200px;">
                    </div>
                </div>

                <div class="text-center mb-5 pt-1  pb-1">
                    <button class="btn btn-primary btn-block fa-lg  mb-3" type="submit">submit</button>
                </div>

            </div>





            <script>

                        // Ambil elemen select
            var selectElem = document.getElementById('komponenpenunjang_id');

            // Ketika terjadi perubahan pada select, jalankan fungsi
            selectElem.addEventListener('change', function() {
            // Ambil nilai data-kum dari opsi yang dipilih
            var dataKum = this.options[this.selectedIndex].getAttribute('data-kum');
            
            // Isi nilai data-kum pada input yang diinginkan
            document.getElementById('angkakredit').value = dataKum;

            
            });


            </script>
        </form>
    </div>
</div>

<div class="container">


</div>

<div class="col" style="margin-top:110px">
    <div class="row mx-auto">
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/logopendidikan.png')}}" class="card-img-top img-responsive" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pendidikan dan Pengajaran</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card" style="width: 215px;border:none" >
                <img src="{{asset('aset_web/logopengabdian.png')}}" class="card-img-top img-responsive" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pengabdian</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                <img src="{{asset('aset_web/logopenelitian.png')}}" class="card-img-top img-responsive" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Penelitian</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                <img src="{{asset('aset_web/logodokumenpenunjang.png')}}" class="card-img-top img-responsive" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Dokumen Penunjang</a>
                </div>
                  
              </div>
        </div>
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                <img src="{{asset('aset_web/logolampiran.png')}}" class="card-img-top img-responsive" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Lampiran</a>
                </div>
              </div>
        </div>
    </div>
    <br>
    <br>
</div>
@endsection