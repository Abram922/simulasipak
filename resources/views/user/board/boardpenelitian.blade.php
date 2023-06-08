@extends('.layouts.user')
@section('content1')
<br>
<br>
<br>
<br>

<div class="row">
  <div class="col-lg-10 mx-auto">
    <div class="jumbotron d-flex" > 
      <div class="">
          <h3>Hi,{{ Auth::user()->name }}</h3>
          <p style="">Berikut Data Penelitian Anda</p>
      </div>
      <img src="url('{{ asset('aset_web/p1.png') }}'" alt="">
      </div>
    </div>
  </div>

  
  <div class="col-lg-10 mx-auto" style="margin-top: 30px"> 
    <h1>Jurnal</h1>              
    <table class="table">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Akreditasi</th>
            <th>jenis Penulis</th>
            <th>Angka Kredit</th>
            <th>Aksi</th>
        </thead>

        @foreach ($penelitian as $pn)
        <tbody>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pn->judul }}</td>
                <td> {{ $pn->akreditasi->akreditasi }}</td>
                <td> {{ $pn->penulis->jenispenulis }}</td>               
                <td> {{ $pn->angkakredit }}</td>

           
                <td>
                  <div class="modal fade" id="pelaksanaan_penelitian_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered  ">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Penelitian</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('pelaksanaanpenelitian.update', $pn->id)}}" enctype="multipart/form-data" >
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                            <div class="col-md m-3">
                                                <label for="judul">Judul</label>
                                                <input type="text" class="form-control" value="{{ $pn->judul }}" id="judul" name="judul">
                                            </div>
                                        </div>
                                
                                        <div class="form-group row">
                                                <div class="col-md m-3">
                                                    <label for="jurnal">Jurnal</label>
                                                    <input type="text" class="form-control" value="{{ $pn->jurnal }}" id="jurnal" name="jurnal">
                                                </div>
                                        </div>

                                        <div class="form-group row ">
                                            <div class="col-md m-3">
                                                <label for="akreditasi">Akreditasi Karya Ilmiah</label>
                                                <select class="form-control" id="id_jeniskarya" name="id_jeniskarya">
                                                    <option>Pilih Akreditasi</option>
                                                    @foreach ($akreditasi as $p)
                                                        <option class="" value="{{$p->id}}" data-kum-akreditasi ="{{$p->nilai}}" title="{{$p->akreditasi}}">{{Str::limit($p->akreditasi,100)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="jenis_penulis">Jenis Penulis</label>
                                                @foreach ($jenispenulis as $p)
                                                <div class="form-check form-check-inline m-3">
                                                <input class="form-check-input" @if($p->penulis_khusus == 1 ) id="penulis_khusus" data="penulis_khusus" @endif type="radio" name="jenis_penulis" kunci="{{$p->id}}" value="{{$p->persentase_skor}}" onclick="updateIdJenisPenulis(this)" >
                                                <label class="form-check-label" for="jenis_penulis-{{$p->id}}">{{ $p->jenispenulis }}</label>  
                                                </div>
                                                @endforeach
                                        </div>

                                        <input hidden id="jenispenulis_id" name="jenispenulis_id">      

                                        <script>
                                            function updateIdJenisPenulis(selectedRadioButton) {
                                                var kunci = selectedRadioButton.getAttribute('kunci');
                                                document.getElementById('jenispenulis_id').value = kunci;}
                                        </script>
                        


                                        <div class="form-group row">
                                                <div class="col-md m-3">
                                                <label for="author_persentase">Persentase Penulis</label>
                                                <input readonly type="number" class="form-control" id="author_persentase" name="author_persentase" value="{{ $pn->author_persentase }}"  oninput="getValues()">
                                                </div>
                                                <div class="col-md m-3">
                                                    <label for="jumlah_penulis">Jumlah Penulis</label>
                                                    <input readonly type="number" class="form-control" value="{{ $pn->jumlah_penulis }}" id="jumlah_penulis" name="jumlah_penulis"  oninput="getValues()">
                                                </div>
                                                <div class="col-md m-3">
                                                <label for="angka_kredit">Angka Kredit</label>
                                                <input readonly type="number" class="form-control" id="jumlah_angka_kredit" name="jumlah_angka_kredit" value="{{ number_format($pn->jumlah_angka_kredit,2) }}" placeholder="isi jumlah penulis dikurangi penulis pertama" onkeyup="calculate()">
                                            </div>
                                        </div> 
                                
                                        <div class="form-group row">
                                                <div class="col-md m-3">
                                                    <label for="tanggal">Tanggal Terbit</label>
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pn->tanggal }}">
                                                </div>
                                    
                                                <div class="col-md m-3">
                                                    <label for="link">Link</label>
                                                    <input type="text" class="form-control" id="link" value="{{ $pn->link }}" name="link">
                                                </div>
                                        </div>
                                    </div>
 
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                  </div>

                                </form>        
                      </div>
                    </div>
                    
                  </div>
                    <a href="{{ route('pelaksanaanpenelitian.edit', $pn->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pelaksanaan_penelitian_Modal">ubah</a>
                    <form action="{{ route('pelaksanaanpenelitian.destroy', $pn->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
                  </form>

                </td>
        </tbody>
        @endforeach  
    </table>

    <table class="table">
      </table>


  </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
  var jenispenulis = document.getElementsByName('jenis_penulis');
  var x = document.getElementById('jumlah_penulis');
  var y = document.getElementById('author_persentase');
  
  jenispenulis.forEach(radio => {
      radio.addEventListener('click', function() {
          if (this.id == 'penulis_khusus') {
              x.setAttribute('readonly', '');
              y.setAttribute('readonly', '');
              x.value = "";
              y.value= "";
              calculate();                       
          } else {
            y.removeAttribute('readonly');                  
            x.removeAttribute('readonly');      
            calculate();              
         
          }
      });
  });
</script>
<script>
    function getValues() {
    var persentase_penulis = document.getElementById('author_persentase').value;
    var selectElem = document.getElementById('id_jeniskarya');
    var jenis_penulis = document.getElementsByName("jenis_penulis");
    var jumlah_penulis = document.getElementById('jumlah_penulis').value;
    var dataKum = selectElem.options[selectElem.selectedIndex].getAttribute('data-kum-akreditasi');
    var x = 0;
    var z = 0;

    z = dataKum * persentase_penulis / 100;

    jenis_penulis.forEach(radio => {

    if (radio.checked) {
      skor = parseFloat(radio.value);
      var hasily = 0;
      if (radio.id == 'penulis_khusus') {
        console.log('ini penulis_khusus xxx');
        hasily = ( dataKum * (skor/100));
      } else {
        console.log('ini tidak penulis_khusus xxx');
        console.log('ini datakum', dataKum);
        console.log("ini z",z);
        hasily = z / jumlah_penulis;
      }
      console.log("ini hasil y",hasily);
      document.getElementById("jumlah_angka_kredit").value = hasily;
    }
    });  

    return {
      selectElem: selectElem,
      jenis_penulis: jenis_penulis,
      jumlah_penulis:jumlah_penulis,
      persentase_penulis:persentase_penulis,
      dataKum: dataKum,
      z:z
    };
  }
  function calculate() {
    var values = getValues();
    var jlh_penulis = values.jumlah_penulis;
    var persentase = values.persentase_penulis;
    var dataKum = values.dataKum;
    var z = values.z;
    console.log("menguji",z);
    
    values.jenis_penulis.forEach(radio => {

      if (radio.checked) {
        skor = parseFloat(radio.value);
        var hasil = 0;
        if (radio.id == 'penulis_khusus') {
          console.log('ini penulis_khusus');
          hasil1 = ( dataKum * (skor/100));
        } else {
          console.log('ini tidak penulis_khusus');
          hasilx = (dataKum * (persentase / 100));
          console.log("hasilx",hasilx);
          hasil1 = hasilx /jlh_penulis;
        }
      }
    });    
  }

  // Tambahkan event listener pada setiap elemen HTML yang dibutuhkan
  getValues().selectElem.addEventListener('change', calculate);
  getValues().jenis_penulis.forEach(radio => {
    radio.addEventListener('click', calculate);
  });
  getValues().persentase_penulis.addEventListener('input', calculate);          
  getValues().jumlah_penulis.addEventListener('input', calculate);  

</script>





<div class="col-lg-10 mx-auto" style="margin-top: 30px"> 
<h1>HaKI dan Karya</h1>      
<br><br>     
  <table class="table">
      <thead>
          <th>No</th>
          <th>Judul</th>
          <th>Semester</th>
          <th>komponen HaKI dan Karya</th>
          <th>Angka Kredit</th>
          <th>File</th>
          <th>Aksi</th>
      </thead>

      @foreach ($hakikarya as $pn)
      <tbody>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pn->judul }}</td>
              <td>{{ $pn->semester->semester }} </td>
              <td> {{ $pn->karya->komponenkegiatan }}</td>                 
              <td>{{ number_format($pn->jumlah_angka_kredit,2) }}</td>  
              <td>
                <a href="/bukti_unsur_utama/pelaksanaan_penelitian/{{ $pn->bukti }}" target="_blank" class="btn btn-warning">Lihat File</a>
                <a href="/bukti_unsur_utama/pelaksanaan_penelitian/{{ $pn->bukti }}" download target="_blank" class="btn btn-info">Download File</a>
              </td>
                      
              <td>
                  <a href="{{ route('karya.edit', $pn->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pelaksanaan_haki_Modal">ubah</a>
                  <form action="{{ route('karya.destroy', $pn->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">hapus</button>
                </form>

              </td>
      </tbody>

                <div class="modal fade" id="pelaksanaan_haki_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered  ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Penelitian</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                          <div class="modal-body">
                              <form method="POST" action="{{route('karya.update', $pn->id)}}" enctype="multipart/form-data" >
                                      @csrf
                                      @method('PUT')

                                      <div class="form-group row">
                                        <div class="col-md m-3">
                                            <label for="judul">Judul Karya atau Rancangan</label>
                                            <input type="text" class="form-control"  name="judul" id="judul" value="{{ $pn->judul }}">
                                        </div>
                                      </div>
          
                                  <div class="form-group row">
                                    <div class="col-md m-3">
                                      <label for="semester">Jenis Karya atau Rancangan</label>
                                      <select class="form-control" name="id_jeniskarya" id="id_jeniskarya" value="{{ $pn->id_jeniskarya }}" ">
                                          <option>Pilih Komponen</option>
                                          @foreach ($komponenpenelitian as $s)
                                              <option class="" value="{{$s->id}}" angka-kredit="{{ $s->angkakredit }}" title="{{$s->komponenkegiatan}}">{{Str::limit($s->komponenkegiatan,100)}}</option>
                                          @endforeach
                                      </select>
                                    </div>  
          
                                    <div class="col-md m-3">
                                      <label for="semester">Semester</label>
                                      <select class="form-control" id="id_semester" name="id_semester" required>
                                        <option value="">Pilih Semester</option>
                                        @php
                                          $semester = App\Models\semester::all();
                                        @endphp
                                        @foreach ($semester as $s)
                                          <option class="" value="{{$s->id}}" title="{{$s->semester}}">{{Str::limit($s->semester,100)}}</option>
                                        @endforeach
                                      </select>
                                      <div id="semesterAlert" class="alert alert-danger mt-2 d-none">Pilih salah satu semester.</div>
                                    </div>
               
                                  </div>

                                  <div class="form-group row">
                                    <div class="col-md m-3">
                                      <label for="bukti">Bukti</label>
                                      <input class="form-control @error('bukti') is-invalid @enderror" type="file"  name="bukti" id="bukti">
                                      @error('bukti')
                                          <div class="invalid-feedback">
                                              {{$message}}
                                          </div>
                                      @enderror
                                    </div>
                                  </div>


   
                                  </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>

                              </form>        
                    </div>
                  </div>
                  
                </div>      
      @endforeach  
  </table>

  <table class="table">
    </table>


</div>





@endsection














