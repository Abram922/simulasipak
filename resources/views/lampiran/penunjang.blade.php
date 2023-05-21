@extends('.layouts.user')
@section('content1')

    <div class="col-lg-10 mx-auto">
        <h1>Lampiran Penunjang</h1>
    </div>

    <div class="col-lg-10 mx-auto"  style="margin-top:110px">
                <div class="col-md-12"  style="margin-top:110px">
                    <div class="row">
                        @foreach ($dokumenpenunjangs as $p)                
                            <div class="col">
                                    <div class="card" style="width: 215px;border:none">
                                        </span>
                                        <img src="{{asset('aset_web/logopdf.png')}}" class="card-img-top" alt="...">
                                        <div class="text-center">
                                            <a href="/bukti_unsur_utama/pelaksanaan_pm/{{$p->buktifisik}}"  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">{{ $p->buktifisik }}</a>
                                        </div>
                                    </div>
                            </div>
                        @endforeach                   
                    </div>
                </div>
    </div>

@endsection