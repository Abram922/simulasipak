@extends('.layouts.user')
@section('content1')

<br>
<br>
<br>
<br>

  

<div class="jumbotron d-flex col-lg-10 mx-auto" > 
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


<div class="card shadow mb-4 col-lg-6 mx-auto">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold"><b>Kredit Angka Kumulatif</b></h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('kum.store') }}" >
            @csrf
            <div class="mx-auto">

              <div class="form-group row">
                <div class="col-md text-center">
                    <label for="judul" style="display: inline-block; width: 150px;">Judul KUM:</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" style="display: inline-block; width: 200px;" required>
                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
              </div>
        
              <div class="form-group row">
                  <div class="col-md text-center">
                      <label for="id_jabatan_sekarang" style="display: inline-block;width: 150px;">Jabatan Saat Ini:</label>
                      <select class="form-control @error('id_jabatan_sekarang') is-invalid @enderror" id="id_jabatan_sekarang" name="id_jabatan_sekarang" style="display: inline-block; width: 200px;" required>
                          <option value="">Pilih Jabatan</option>
                          @foreach ($jabatanpref as $js)
                          <option class="" value="{{ $js->id }}" data-kum-pref="{{ $js->angkaKreditKumulatif }}" title="{{ $js->jabatanpref }}">{{ Str::limit($js->jabatan, 100) }}</option>
                          @endforeach
                      </select>
                      @error('id_jabatan_sekarang')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>
        
              <div class="form-group row">
                  <div class="col-md text-center">
                      <label for="id_jabatan_dituju" style="display: inline-block;width: 150px;">Jabatan yang Usulan:</label>
                      <select class="form-control @error('id_jabatan_dituju') is-invalid @enderror" id="id_jabatan_dituju" name="id_jabatan_dituju" style="display: inline-block; width: 200px;" required>
                          <option value="">Pilih Jabatan</option>
                          @foreach ($jabatanafter as $px)
                          <option class="" value="{{ $px->id }}" data-kum-after="{{ $px->angkaKreditKumulatif }}" title="{{ $px->jabatanafter }}">{{ Str::limit($px->jabatan, 100) }}</option>
                          @endforeach
                      </select>
                      @error('id_jabatan_dituju')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>
            
              <div class="form-group row">
                  <div class="col-md text-center">
                      <label for="tmt" style="display: inline-block; width: 150px;">TMT:</label>
                      <input type="date" class="form-control @error('tmt') is-invalid @enderror" id="tmt" name="tmt" style="display: inline-block; width: 200px;" required>
                      @error('tmt')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
              </div>  
                
                <div class="form-group row ">
                    <div class="col-md text-center">
                      <label for="score" style="display: inline-block; width: 150px;">Score Dibutuhkan</label>
                      <input readonly type="text" class="form-control" id="score" name="score" style="display: inline-block; width: 200px;">
                    </div>
                </div>
                <div class="col-md text-center">
                    <button class="btn btn-primary btn-block fa-lg " type="submit">submit</button>
                </div>



                <script>
                  function calculateScore() {
                    var selectElem = document.getElementById('id_jabatan_dituju');
                    var selectElem2 = document.getElementById('id_jabatan_sekarang');
                    var scoreElem = document.getElementById('score');
                
                    var updateScore = function() {
                      var dataKumafter = selectElem.options[selectElem.selectedIndex].getAttribute('data-kum-after');
                      var dataKumpref = selectElem2.options[selectElem2.selectedIndex].getAttribute('data-kum-pref');
                      var hasil = parseFloat(dataKumafter) - parseFloat(dataKumpref);
                      scoreElem.value = hasil;
                      console.log(hasil);
                    };
                
                    selectElem.addEventListener('change', updateScore);
                    selectElem2.addEventListener('change', updateScore);
                  }
                
                  window.addEventListener('DOMContentLoaded', calculateScore);
                </script>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        <div class="col-md-3 button-muncul position-relative d-flex">
                            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp" class="card-img" alt="..." width="350">
                            <div class="d-flex">
                                <a href="{{ route('kum.show', $k->id) }}" class="btn btn-info position-absolute top-50 start-50 translate-middle" id="btn_check">lengkapi</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card-body">
                                <h4></h4>
                                <h3 class="card-title"><b>{{ $k->judul }}</b></h3>
                                <p>Jabatan Saat Ini: {{ $k->jabatanSekarang->jabatan}}</p>
                                <p>Jabatan Saat Usulan: {{ $k->jabatanDituju->jabatan}}</p>
                                <div class="d-flex justify-content-end">
                                    <div class="ml-auto">
                                        <a id="editx" href="#" class="btn btn-warning ml-2" data-toggle="modal" data-target="#editkummodal_{{ $k->id }}">edit</a>
                                        <a id="hapusx" href="#" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapuskummodal_{{ $k->id }}">hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal fade" id="editkummodal_{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit KUM</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <div class="modal-body">
                                <form method="POST" action="{{ route('kum.update', $k->id) }}" >
                                    @csrf
                                    @method('PUT')
                                    <div class="mx-auto">
                                      <div class="form-group row">
                                        <div class="col-md text-center">
                                            <label for="judul" style="display: inline-block; width: 150px;">Judul KUM:</label>
                                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" style="display: inline-block; width: 200px;" required>
                                            @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                      </div>
                                
                                      <div class="form-group row">
                                          <div class="col-md text-center">
                                              <label for="id_jabatan_sekarang" style="display: inline-block;width: 150px;">Jabatan Saat Ini:</label>
                                              <select class="form-control @error('id_jabatan_sekarang') is-invalid @enderror" id="id_jabatan_sekarang" name="id_jabatan_sekarang" style="display: inline-block; width: 200px;" required>
                                                  <option value="">Pilih Jabatan</option>
                                                  @foreach ($jabatanpref as $js)
                                                  <option class="" value="{{ $js->id }}" data-kum-pref="{{ $js->angkaKreditKumulatif }}" title="{{ $js->jabatanpref }}">{{ Str::limit($js->jabatan, 100) }}</option>
                                                  @endforeach
                                              </select>
                                              @error('id_jabatan_sekarang')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                              @enderror
                                          </div>
                                      </div>
                                
                                      <div class="form-group row">
                                          <div class="col-md text-center">
                                              <label for="id_jabatan_dituju" style="display: inline-block;width: 150px;">Jabatan yang Usulan:</label>
                                              <select class="form-control @error('id_jabatan_dituju') is-invalid @enderror" id="id_jabatan_dituju" name="id_jabatan_dituju" style="display: inline-block; width: 200px;" required>
                                                  <option value="">Pilih Jabatan</option>
                                                  @foreach ($jabatanafter as $px)
                                                  <option class="" value="{{ $px->id }}" data-kum-after="{{ $px->angkaKreditKumulatif }}" title="{{ $px->jabatanafter }}">{{ Str::limit($px->jabatan, 100) }}</option>
                                                  @endforeach
                                              </select>
                                              @error('id_jabatan_dituju')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                              @enderror
                                          </div>
                                      </div>
                                    
                                      <div class="form-group row">
                                          <div class="col-md text-center">
                                              <label for="tmt" style="display: inline-block; width: 150px;">TMT:</label>
                                              <input type="date" class="form-control @error('tmt') is-invalid @enderror" id="tmt" name="tmt" style="display: inline-block; width: 200px;" required>
                                              @error('tmt')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                              @enderror
                                          </div>
                                      </div>  
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
            </div>

            <div class="modal fade" id="hapuskummodal_{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus KUM ini?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Peringatan: Data perhitungan anda akan hilang ketika menghapus KUM ini</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                            <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('hapus-kum-{{ $k->id }}').submit();">hapus</a>
                        </div>
                        <form id="hapus-kum-{{ $k->id }}" action="{{ route('kum.destroy', $k->id) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>


          @endforeach
      </div>
  </div>
</div>


@endsection