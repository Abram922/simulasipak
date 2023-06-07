@extends('.layouts.user')
@section('content1')
<br>
<br>
<br>
<br>

    <div class="col-lg-10 mx-auto">
        <h1>Lampiran Pengabdian Masyarakat</h1>
        <a id="" href="#" class="btn btn-primary ml-2" data-toggle="modal" data-target="#tambah-modal">Tambah</a>
        
    </div>

    <div class="col-lg-10 mx-auto"  style="margin-top:110px">
        <div class="col-md-12"  style="margin-top:110px">
            <div class="row">
                @foreach ($pelaksanan_pm as $h)                
                    <div class="col">
                            <div class="card" style="width: 215px;border:none">
                                </span>
                                <img src="{{asset('aset_web/logopdf.png')}}" class="card-img-top" alt="...">
                                <div class="text-center">
                                        <a style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">{{ substr($h->buktifisik, 15, 100) }}</a>
                                </div>   
                                <div class="text-center">
                                    <a href="/bukti_unsur_utama/pelaksanaan_pm/{{ $h->buktifisik }}" target="_blank" class="btn btn-warning">
                                        <span class="logo">&#128065;</span>
                                    </a>
                                    <a href="/bukti_unsur_utama/pelaksanaan_pm/{{ $h->buktifisik }}" download target="_blank" class="btn btn-info">
                                        <span class="logo">&#128229;</span>
                                    </a>
                                </div>                                             
                                        

                            </div>
                    </div>
                @endforeach                   
            </div>
        </div>

    </div>


    <div class="col-lg-10 mx-auto"  style="margin-top:110px">

        <div class="col-md-12"  style="margin-top:110px">
        <h1>Data Tambahan</h1>            
            <div class="row">
                @foreach ($lampiran as $p)                
                    <div class="col">
                            <div class="card" style="width: 215px;border:none">
                                </span>
                                <img src="{{asset('aset_web/logopdf.png')}}" class="card-img-top" alt="...">
                                <div class="text-center">
                                        <a style="width: 174px; height:48px; margin-top: -70px;border-radius:10px  ">{{ substr($p->file, 15, 100) }}</a>
                                </div>   
                                <div class="text-center">
                                    <a href="/lampiran/{{ $p->file }}" target="_blank" class="btn btn-warning">
                                        <span class="logo">&#128065;</span>
                                    </a>
                                    <a href="/lampiran/{{ $p->bukti }}" download target="_blank" class="btn btn-info">
                                        <span class="logo">&#128229;</span>
                                    </a>
                                </div>                                             
                                        

                            </div>
                    </div>
                @endforeach                   
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambah-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Lampiran Pendidikan </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form action="{{ route('lampirans.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input hidden type="text" class="form-control"  id="jenislampiran" name="jenislampiran" value="pengabdiankepadamasyarakat" >            
                                <div class="form-group row">
                                    <div class="col-md m-3">
                                        <label for="file">File</label>
                                        <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file">
                                        @error('file')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                    <button class="btn btn-primary" type="submit" >submit</button>
                                </div>
                                
                        </form>
                    </div>
        </div>
    </div>

@endsection