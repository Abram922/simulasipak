@extends('.layouts.user')
@section('content1')

<!-- Card -->
<div class="card">
  <div class="card-header">
  <h5>Featured</h5>
  </div>
  <div class="card-body">

    <!-- FORM -->
    <div class="card">
    <div class="card-body">
    <form>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama">
    </div>

    <div class="mb-3">
        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
        <input type="text" class="form-control" id="tanggallahir">
    </div>

    <div class="mb-3">
        <label for="tempatlahir" class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempatlahir">
    </div>

    <div class="mb-3">
        <label for="nidn" class="form-label">NIDN</label>
        <input type="text" class="form-control" id="nidn">
    </div>

    <div class="mb-3">
        <label for="ikatankerja" class="form-label">Ikatan Kerja</label>
        <input type="text" class="form-control" id="ikatankerja">
    </div>

    <div class="mb-3">
        <label for="institusi" class="form-label">Institusi</label>
        <input type="text" class="form-control" id="institusi">
    </div>

    <div class="mb-3">
        <label for="pangkat" class="form-label">Pangkat/Golongan</label>
        <input type="text" class="form-control" id="pangkat">
    </div>

    <div class="mb-3">
        <label for="Email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="Email">
    </div>

    <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password">
    </div>

    <!-- <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly> -->
    <br><button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
    <!-- Akhir Form -->
    
  </div>
</div>
<!-- Tutup Card -->
@endsection