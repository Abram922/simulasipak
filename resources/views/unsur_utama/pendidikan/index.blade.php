@extends('.layouts.user')
@section('content1')
<div class="col-md-12" style="margin-top: 30px">
    <h3>Input Data Pelaksanaan Pendidikan</h3>
    <br>



    <form method="POST" action="{{route('unsurpendidikan.store')}}" enctype="multipart/form-data" >
        @csrf

        <div class="form-group row">
            <div class="col-md">
                <label for="institusi">Institusi Pendidikan</label>
                <input type="text" class="form-control" id="institusi" name="institusi">
            </div>
        </div>

        

        <div class="form-group ">
            <label for="stratapendidikan">Strata Pendidikan</label>
            <select class="form-control" id="strata_id" name="strata_id">
                <option>Pilih Tingkat Strata Pendidikan</option>
                @foreach ($strata as $p)
                    <option class="" value="{{$p->id}}" data-kum ="{{$p->nilai}}" title="{{$p->strata}}">{{Str::limit($p->strata,100)}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group row">
            <div class="col-md">
                <label for="tanggal">Tanggal Kelulusan</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>


            <div class="col-md">
                <label for="kum">Jumlah KUM</label>
                <input disabled type="text" class="form-control" id="kum" name="kum">
            </div>
        </div>

        
        <div class="form-group ">
            <label for="bukti">Bukti</label>
            <input class="form-control @error('bukti') is-invalid @enderror" type="file" id="bukti" name="bukti">
            @error('bukti')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        <script>
        var selectElem = document.getElementById('strata_id');
        selectElem.addEventListener('change', function() {
        var dataKum = this.options[this.selectedIndex].getAttribute('data-kum');
        document.getElementById('kum').value = dataKum;
        });
        </script>
    </form>
</div>
@endsection

