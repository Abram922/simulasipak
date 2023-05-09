@extends('.layouts.user')
@section('content1')


<section id="hero" class="d-flex align-items-center" style="
    width: 100%;
    height: 31vh;
    background: url('{{ asset('aset_web/profilll.jpeg') }}') center;
    background-size: cover;
    position: relative;
    padding: 0;">
    <img src="{{asset('aset_web/p1.png')}}" alt="couple" width="200" class="rounded-circle img-thumbnail" style= "margin-top:50px; margin-left:50px;  margin-bottom: -250px;"/>
</section>

<div class="">
  <div class="row">

    <!-- Col 1 -->
    <div class="col">
        <br><br><br><br><br><br>
    <!-- Tabel -->
    <table class="table table-borderless">
    <tbody>
        <tr>
        <td><p><b>{{ Auth::user()->name }}</b></p></td>
        </tr>
        <tr>
        <td>{{ Auth::user()->email }}</td>
        </tr>

        <tr>
        <td>&nbsp;</td>
        </tr>
        <tr>
        <td><p><b>{{ Auth::user()->jabatan_fungsional}}</b></p></td>
        </tr>

        <tr>
        <td><a href="{{asset('/ubahprofil')}}" class="btn btn-primary">Ubah</a></td>
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
    <tbody>
        <tr><td>Nama Lengkap</td>
        <tr>
        <td><p><b>{{ Auth::user()->name }}</b></p></td>
        </tr>

        <tr>
        <td>Ikatan Kerja</td>
        </tr>
        <tr>
        <td><p><b>{{ Auth::user()->ikatan_kerja }}</b></p></td>
        </tr>

        <tr>
        <td>Tempat, Tanggal Lahir</td>
        </tr>
        <tr>
        <td><p><b>{{ Auth::user()->tempat_lahir }}, {{ Auth::user()->tanggal_lahir }}</b></p></td>
        </tr>

        <tr>
        <td>Pangkat/Golongan</td>
        </tr>
        <tr>
        <td><p><b>{{ Auth::user()->pangkat }}</b></p></td>
        </tr>

    </tbody>
    </table>
    </div>
    <!-- Tutup Col 2 -->

    <!-- Col 3 -->
    <div class="col">
    <table class="table table-borderless">
    <tbody>
        <tr>
        <td>NIP</td>
        </tr>
        <tr>
        <td><p><b>{{ Auth::user()->NIDN }}</b></p></td>
        </tr>

        <tr>
        <td>institusi</td>
        </tr>
        <tr>
        <td><p><b>{{ Auth::user()->institusi }}</b></p></td>
        </tr>

        <tr>
        <td>Fakultas</td>
        </tr>
        <tr>
        <td><p><b>{{ Auth::user()->fakultas }}</b></p></td>
        </tr>
    </tbody>
    </table>
    <!-- Tutup Col 3 -->
    
    </div>
  </div>
</div>


@endsection