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

<script>
    $(document).ready(function(){
      // saat tombol dengan class 'btn' di klik
      $('.btn').click(function(){
        // menutup semua collapse yang ada di dalam class 'collapse-container'
        $('.collapse-container').find('.collapse').collapse('hide');
      });
    });
  </script>
  


<div class="row">
    <div class="col">
      <a class="btn btn-primary mb-3" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">Pendidikan</a>
    </div>
    <div class="col">
      <button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Pelaksanaan Pendidikan</button>
    </div>
    <div class="col">
      <button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Pelaksanaan Penelitian</button>
    </div>
    <div class="col">
        <button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Pelaksanaan Pengabdian Masyarakat</button>
      </div>
      <div class="col">
        <button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">Unsur Penunjang</button>
      </div>
</div>

    <div class="col">
      <div class="collapse " id="collapse1">
        <div class="card card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
      </div>
    </div>
    <div class="col">
      <div class="collapse " id="collapse2">
        <div class="card card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
      </div>
    </div>
    <div class="col">
        <div class="collapse " id="collapse3">
          <div class="card card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
    </div>
    <div class="col">
        <div class="collapse " id="collapse4">
          <div class="card card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
    </div>
    <div class="col">
        <div class="collapse " id="collapse5">
          <div class="card card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
          </div>
        </div>
    </div>



<!-- Menambahkan library jQuery dan Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



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