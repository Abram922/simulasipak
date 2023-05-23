@extends('.layouts.user')
@section('content1')


@foreach($user as $s)
<section id="hero" class="d-flex align-items-center" style="
    width: 100%;
    height: 31vh;
    background: url('{{ asset('aset_web/profilll.jpeg') }}') center;
    background-size: cover;
    position: relative;
    padding: 0;">
    <div class="container">
    <img src="{{asset('profill')}}/{{ $s->foto }}" alt="profil" width="170"  class="rounded-circle img-thumbnail" style= "margin-top:50px; margin-bottom: -200px;"/>
    </div>
</section>

<div class="container">
  <div class="row">

    <!-- Col 1 -->
    <div class="col">
        <br><br><br><br><br>
    <!-- Tabel -->
    <table class="table table-borderless">
    <tbody>
    <tr><td><p style="font-size:160%; margin-bottom: -20px;"><b>{{ $s->name}}</b></p></td></tr>
    <tr><td>{{ $s->email}}</td></tr>

        <tr>
        <td><p style="font-size:160%; margin-top: 20px;"><b>{{ $s->jabatan_fungsional}}</b></p></td>
        </tr>

        <tr>
        <td><a href="/ubahprofil/{{$s->id}}" class="btn btn-primary">Ubah</a></td>
        </tr>


    </tbody>
    </table>
    <!-- Tutup Tabel -->

    </div>
    <!-- Tutup Col 1 -->

    <!-- Col 2 -->
    <div class="col">
    <!-- Tabel -->
    <table class="table table-borderless">
        <br><br>
    <tbody>
        <tr><td>Nama Lengkap</td>
        <tr>
        <td><p><b>{{ $s->name }}</b></p></td>
        </tr>

        <tr>
        <td>Ikatan Kerja</td>
        </tr>
        <tr>
        <td><p><b>{{ $s->ikatan_kerja }}</b></p></td>
        </tr>

        <tr>
        <td>Tempat, Tanggal Lahir</td>
        </tr>
        <tr>
        <td><p><b>{{ $s->tempat_lahir }}, {{ $s->tanggal_lahir }}</b></p></td>
        </tr>

        <tr>
        <td>Pangkat/Golongan</td>
        </tr>
        <tr>
        <td><p><b>{{ $s->pangkat }}</b></p></td>
        </tr>

    </tbody>
    </table>
    </div>
    <!-- Tutup Col 2 -->

    <!-- Col 3 -->
    <div class="col">
    <br><br>
    <table class="table table-borderless">
    <tbody>
        <tr>
        <td>NIP</td>
        </tr>
        <tr>
        <td><p><b>{{ $s->NIDN }}</b></p></td>
        </tr>

        <tr>
        <td>institusi</td>
        </tr>
        <tr>
        <td><p><b>{{ $s->institusi }}</b></p></td>
        </tr>

        <tr>
        <td>Fakultas</td>
        </tr>
        <tr>
        <td><p><b>{{ $s->fakultas }}</b></p></td>
        </tr>

        <tr>
        <td>Email</td>
        </tr>
        <tr>
        <td><p><b>{{ $s->email }}</b></p></td>
        </tr>

        <!--  margin-left:50px;  -->
    </tbody>
    </table>
    <!-- Tutup Col 3 -->
    </div>
  </div>
</div>
@endforeach

@endsection
