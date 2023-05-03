@extends('.layouts.user')
@section('content1')

<div>
    <h1>Lampiran</h1>
</div>

@foreach ($pendidikan as $p)
    <div class="col-md-12"  style="margin-top:110px">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 215px;border:none">
                  </span>
                <img src="{{asset('asetweb/logopdf.png')}}" class="card-img-top" alt="...">
                <div class="text-center">
                    <h4>
                        <a href="/bukti/{{$p->bukti}}"  style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">{{ $p->bukti }}</a>
                    </h4>
                    
                </div>
              </div>
        </div>
    </div>
        
</div>
@endforeach




@endsection