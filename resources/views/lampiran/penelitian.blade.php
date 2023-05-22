@extends('.layouts.user')
@section('content1')

    <div class="col-lg-10 mx-auto">
        <h1>Lampiran Penelitian</h1>
    </div>

    <div class="col-lg-10 mx-auto">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Link</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pelaksanan_penelitians as $p) 
                        <tr>
                            <td></td>
                            <td>{{ $p->link }}</td>
                        </tr>                        
                    @endforeach

                </tbody>
            </table>
    </div>



                                       


@endsection