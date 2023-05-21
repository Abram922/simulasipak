@extends('.layouts.user')
@section('content1')

    <div class="col-lg-10 mx-auto">
        <h1>Lampiran Penelitian</h1>
    </div>

    <div class="col-lg-10 mx-auto"  style="margin-top:110px">
                <div class="col-md-12"  style="margin-top:110px">
                    <div class="row">
                        @foreach ($pelaksanan_penelitians as $p)                
                            <div class="col">
                                    <div class="card" style="width: 215px;border:none">
                                        </span>
                                        <img src="{{asset('aset_web/logopdf.png')}}" class="card-img-top" alt="...">

                                    </div>
                            </div>
                        @endforeach                   
                    </div>
                </div>
    </div>

@endsection