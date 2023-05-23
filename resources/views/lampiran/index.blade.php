@extends('.layouts.user')
@section('content1')
<div class="col-lg-10 mx-auto">
    <h1>Lampiran</h1>
</div>

<div class="col-lg-10 mx-auto"  style="margin-top:110px">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/red.png')}}" style="width: 130px; height:115px" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4><a href="{{ route('lampiranpendidikan') }}"  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pendidikan</a></h4>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/pendidikan.png')}}" style="width: 130px; height:115px" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4><a href="{{ route('lampirandatapendidikan') }}"  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pelaksanaan Pendidikan</a></h4>
                </div>
              </div>
        </div>

        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/penelitian.png')}}"  style="width: 130px; height:115px" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4><a href="{{ route('datapenelitian') }}"  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Penelitian</a></h4>
                </div>
              </div>
        </div>



        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/pengabdian.png')}}"  style="width: 130px; height:115px" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4><a href="{{ route('datapm') }}"  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pengabdian Masyarakat</a></h4>
                </div>
              </div>
        </div>

        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/penunjang.png')}}"  style="width: 130px; height:115px" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4><a href="{{ route('datapenunjang') }}"  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Penunjang</a></h4>
                </div>
              </div>
        </div>

    </div>
        
</div>


@endsection