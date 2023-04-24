@extends('.layouts.user')
@section('content1')

<br>
<br>
<br>

<div class="jumbotron d-flex" style=" background-color: #96B3C2;; margin-top: "> 
        <div>
            <h3>Hi,{{ Auth::user()->name }}</h3>
            <p>Kelola Data Kamu Disini</p>
        </div>
        <div class="ms-auto">
            <img src="{{asset('aset_web/p1.png')}}" alt="" style="margin-top: -100px;height: 250px; width: 430px; ">
        </div>
        
</div>

<div class="col-" style="margin-top:110px">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/logopendidikan.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pendidikan dan Pengajaran</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card" style="width: 215px;border:none" >
                <img src="{{asset('aset_web/logopengabdian.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pengabdian</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                <img src="{{asset('aset_web/logopenelitian.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Penelitian</a>
                </div>
              </div>
        </div>
    </div>
    <br>
    <br>

    <div class="row">
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                <img src="{{asset('aset_web/logodokumenpenunjang.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Dokumen Penunjang</a>
                </div>
                  
              </div>
        </div>
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                <img src="{{asset('aset_web/logolampiran.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Lampiran</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                <img src="{{asset('aset_web/logokum.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <a href="" class="btn btn-primary" style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">KUM</a>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection