@extends('.layouts.user')
@section('content1')
<br>
<br>
<br>
<br>

<div class="container">
<!-- Card -->
<div class="card">
  <div class="card-header">
  <h5>Ubah Data</h5>
  </div>
  <div class="card-body">
    <!-- FORM -->
    <br>
    <div class="card">
    <div class="card-body">
    <form method="POST" action="/ubahprofil/update/{{$user->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}">
        @error('name')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fakultas" class="form-label">Fakultas</label>
        <input type="text" class="form-control @error('') is-invalid @enderror" name="fakultas" value="{{$user->fakultas}}">
        @error('fakultas')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class=" mb-3  ">
        <label for="komponen">Jabatan</label>
            <select class="form-control" id="jabatan_fungsional" name="jabatan_fungsional">
                <option>Pilih Jabatan</option>
                @foreach ($jabatan as $js)
                <option class="" value="{{$js->id}}" data-kum-pref ="{{$js->angkaKreditKumulatif}}" title="{{$js->jabatanpref}}">{{Str::limit($js->jabatan,100)}}</option>
                @endforeach
            </select>
    </div>
                  

    <!-- <div class="mb-3">
        <label for="jabatanfungsional" class="form-label">Jabatan Fungsional</label>
        <input type="komponen" class="form-control @error('') is-invalid @enderror" name="jabatan_fungsional" value="{{$user->jabatan_fungsional}}">
        @error('jabatan_fungsional')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
      </div> -->

    <div class="mb-3">
        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{$user->tanggal_lahir}}">
        @error('tanggal_lahir')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    
    <div class="mb-3">
        <input hidden type="text"  name="password" id="password">
    </div>

    <div class="mb-3">
        <label for="tempatlahir" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control @error('') is-invalid @enderror" name="tempat_lahir" value="{{$user->tempat_lahir}}">
        @error('tempat_lahir')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nidn" class="form-label">NIDN</label>
        <input type="number" class="form-control @error('') is-invalid @enderror" name="NIDN" value="{{$user->NIDN}}">
        @error('NIDN')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="ikatankerja" class="form-label">Ikatan Kerja</label>
        <input type="text" class="form-control @error('') is-invalid @enderror" name="ikatan_kerja" value="{{$user->ikatan_kerja}}">
        @error('ikatan_kerja')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="institusi" class="form-label">Institusi</label>
        <input type="text" class="form-control @error('') is-invalid @enderror" name="institusi" value="{{$user->institusi}}">
        @error('institusi')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="pangkat">Pangkat</label>
            <select class="form-control" id="pangkat" name="pangkat">
                <option>Pilih pangkat</option>
                @foreach ($pangkat as $p)
                <option  value="{{$p->id}}" title="{{$p->pangkat}}">{{Str::limit($p->pangkat,100)}}</option>
                @endforeach
            </select>
    </div>

    <div class="mb-3">
        <label>Foto </label><br>
        <img src="{{ asset('profill/' . $user->foto) }}" alt="Foto" style="max-width:100px; margin-top:20px;"><br><br>
        <input type="file" name="foto"  value=" {{ $user->foto }}">
    </div>
    <br><button type="submit" class="btn btn-primary">Ubah</button>
    </form>
    </div>
    </div>
    <!-- Akhir Form -->
    
  </div>
</div>
<!-- Tutup Card -->
</div>

@endsection