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
                      <label for="komponen" style="display: inline-block;width: 150px;">Jabatan yang dituju:</label>
                      <select class="form-control" id="id_jabatan_dituju" name="id_jabatan_dituju" style="display: inline-block; width: 200px;">
                        <option>Pilih Jabatan</option>
                        @foreach ($jabatanafter as $px)
                            <option class="" value="{{$px->id}}" data-kum-after ="{{$px->angkaKreditKumulatif}}" title="{{$px->jabatanafter}}">{{Str::limit($px->jabatan,100)}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="col-md-3 mb-4 mx-auto">
                      <label for="komponen" style="display: inline-block;width: 150px;">Jabatan Saat Ini:</label>
                      <select class="form-control" id="id_jabatan_sekarang" name="id_jabatan_sekarang" style="display: inline-block; width: 200px;">
                        <option>Pilih Jabatan</option>
                        @foreach ($jabatanpref as $js)
                        <option class="" value="{{$js->id}}" data-kum-pref ="{{$js->angkaKreditKumulatif}}" title="{{$js->jabatanpref}}">{{Str::limit($js->jabatan,100)}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                
                <div class="form-group row ">
                    <div class="col-md-3 mb-4 mx-auto">
                      <label for="score" style="display: inline-block; width: 150px;">Score Dibutuhkan</label>
                      <input readonly type="text" class="form-control" id="score" name="score" style="display: inline-block; width: 200px;">
                    </div>
                </div>

                <div class="text-center mb-5 pt-1  pb-1">
                    <button class="btn btn-primary btn-block fa-lg  mb-3" type="submit">submit</button>
                </div>

                <script>
                    var selectElem = document.getElementById('id_jabatan_dituju');
                    var selectElem2 = document.getElementById('id_jabatan_sekarang');
                    selectElem.addEventListener('change', function() {
                      var dataKumafter = this.options[this.selectedIndex].getAttribute('data-kum-after');                      

                        selectElem2.addEventListener('change', function() {
                        var dataKumpref = this.options[this.selectedIndex].getAttribute('data-kum-pref');                      
                        var hasil = parseFloat(dataKumafter) - parseFloat(dataKumpref);
                        document.getElementById('score').value = hasil;
                        console.log(hasil);
                      });

                    });
                </script>

            </div>
        </form>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <h3>Kredit Kumulatif</h3>
            <h3>Terakhir</h3>

        </div>
        <div class="col-lg-8">

          @foreach ($kum as $k)
            <div class="container">
              <div class="card card-hover border-0" style="max-width: 1100px;">
                  <div class="row no-gutters">
                      <div class="col-md-3  position-relative d-flex" >
                          <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp" class="card-img" alt="..." width="350">
                          <div class="d-flex">
                            <a href="{{ route('kum.show', $k->id) }}" class="btn btn-info position-absolute top-50 start-50 translate-middle" id="btn_check">lengkapi</a>
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="card-body">
                              <h4></h4>
                              <p class="card-title"><b>{{ $k->judul }}</b></p>

                              <p class="card-text">Jabatan yang dituju : {{ $k->id_jabatan_dituju }}</p>
                              <input type="text" value="{{ $result }}">
                              <input type="text" id="id_kummm" value="{{ $k->id }}">
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <br>              
          @endforeach
          </div>
          
          <style>
            .card-hover:hover {
              box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
            }
          </style>
          
          <script>
                const cards = document.querySelectorAll('.card-hover');
                cards.forEach(card => {
                const button = card.querySelector('#btn_check');
                card.addEventListener('mouseenter', () => {
                    button.style.display = 'block';
                });
                card.addEventListener('mouseleave', () => {
                    button.style.display = 'none';
                });
                });
          </script>
    </div>
          
    


</div>

@endsection