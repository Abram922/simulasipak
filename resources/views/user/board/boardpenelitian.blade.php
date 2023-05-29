@extends('.layouts.user')
@section('content1')

<div class="row">
  <div class="col-lg-10 mx-auto">
    <div class="jumbotron d-flex" > 
      <div class="">
          <h3>Hi,{{ Auth::user()->name }}</h3>
          <p style="">Berikut Data Pendidikan Anda</p>
      </div>
      <img src="url('{{ asset('aset_web/p1.png') }}'" alt="">
      </div>
    </div>
  </div>

  
  <div class="col-lg-10 mx-auto" style="margin-top: 30px">          
    <table class="table">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Akreditasi</th>
            <th>Angka Kredit</th>
            <th>Aksi</th>
        </thead>

        @foreach ($penelitian as $pn)
        <tbody>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pn->judul }}</td>
                <td>{{ $pn->akreditasi_id }}</td>
                <td>{{ $pn->angkakredit }}</td>              
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
                                                <input type="text" class="form-control" id="judul" name="judul">
                                            </div>
                                        </div>
                                
                                        <div class="form-group row">
                                                <div class="col-md m-3">
                                                    <label for="jurnal">Jurnal</label>
                                                    <input type="text" class="form-control" id="jurnal" name="jurnal">
                                                </div>
                                        </div>

                                        <div class="form-group row ">
                                            <div class="col-md m-3">
                                                <label for="akreditasi">Akreditasi Karya Ilmiah</label>
                                                <select class="form-control" id="akreditasi_id" name="akreditasi_id">
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
                                                <input readonly type="number" class="form-control" id="author_persentase" name="author_persentase"  oninput="getValues()">
                                                </div>
                                                <div class="col-md m-3">
                                                    <label for="jumlah_penulis">Jumlah Penulis</label>
                                                    <input readonly type="number" class="form-control" id="jumlah_penulis" name="jumlah_penulis"  oninput="getValues()">
                                                </div>
                                                <div class="col-md m-3">
                                                <label for="angka_kredit">Angka Kredit</label>
                                                <input readonly type="number" class="form-control" id="angkakredit" name="angkakredit" placeholder="isi jumlah penulis dikurangi penulis pertama" onkeyup="calculate()">
                                            </div>
                                        </div> 
                                
                                        <div class="form-group row">
                                                <div class="col-md m-3">
                                                    <label for="tanggal">Tanggal Terbit</label>
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                                </div>
                                    
                                                <div class="col-md m-3">
                                                    <label for="link">Link</label>
                                                    <input type="text" class="form-control" id="link" name="link">
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
    var selectElem = document.getElementById('akreditasi_id');
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
      document.getElementById("angkakredit").value = hasily;
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







@endsection














