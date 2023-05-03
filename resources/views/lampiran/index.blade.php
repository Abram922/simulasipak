@extends('.layouts.user')
@section('content1')

<div>
    <h1>Lampiran</h1>
</div>

<div class="col-md-12"  style="margin-top:110px">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/pendidikan.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4><a href="{{ route('lampirandatapendidikan') }}"  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pendidikan</a></h4>
                </div>
              </div>
        </div>

        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/penelitian.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4><a href="{{ route('datapenelitian') }}"  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Penelitian</a></h4>
                </div>
              </div>
        </div>



        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/pengabdian.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4><a href=""  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Pengabdian Masyarakat</a></h4>
                </div>
              </div>
        </div>

        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('aset_web/penunjang.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4><a href=""  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">Penunjang</a></h4>
                </div>
              </div>
        </div>

    </div>
        
</div>


@endsection