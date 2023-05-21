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
                <td></td>
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
                        
                                        <script>
                                            function updateIdJenisPenulis(selectedRadioButton) {
                                                var kunci = selectedRadioButton.getAttribute('kunci');
                                                document.getElementById('jenispenulis_id').value = kunci;}
                                        </script>
                        
                                        <input hidden id="jenispenulis_id" name="jenispenulis_id">
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







@endsection














