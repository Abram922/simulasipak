@extends('.layouts.user')
@section('content1')

    <div class="col-lg-10 mx-auto">
        <h1>Lampiran Penelitian</h1>
    </div>

    <div class="col-lg-10 mx-auto">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Link</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pelaksanan_penelitians as $p) 
                        <tr>
                            <td></td>
                            <td>{{ $p->link }}</td>
                        </tr>                        
                    @endforeach

                </tbody>
            </table>
    </div>
    <br>
    <br>

    <div class="col-lg-10 mx-auto">
        <h1>Lampiran Karya</h1>
    </div>

    <div class="col-lg-10 mx-auto"  style="margin-top:110px">
        <div class="col-md-12"  style="margin-top:110px">
            <div class="row">
                @foreach ($haki as $h)                
                    <div class="col">
                            <div class="card" style="width: 215px;border:none">
                                </span>
                                <img src="{{asset('aset_web/logopdf.png')}}" class="card-img-top" alt="...">
                                <div class="text-center">
                                        <a style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">{{ $h->bukti }}</a>
                                </div>   
                                <div class="text-center">
                                    <a href="/bukti_unsur_utama/pelaksanaan_penelitian/{{ $h->bukti }}" target="_blank" class="btn btn-warning">
                                        <span class="logo">&#128065;</span>
                                    </a>
                                    <a href="/bukti_unsur_utama/pelaksanaan_penelitian/{{ $h->bukti }}" download target="_blank" class="btn btn-info">
                                        <span class="logo">&#128229;</span>
                                    </a>
                                </div>                                             
                                        

                            </div>
                    </div>
                @endforeach                   
            </div>
        </div>
    </div>





                                       


@endsection