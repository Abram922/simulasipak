<?php

namespace App\Http\Controllers;

use App\Models\pelaksanan_penelitian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelaksananPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([

            'kum_id' => 'required|max:255',
            'akreditasi_id'=> 'required|max:255',
            'jenispenulis_id'=> 'required|max:255',
            'judul'=> 'required|max:255',
            'jurnal'=> 'required|max:255',
            'link'=> 'required|max:255',
            'jumlah_penulis'=> '',
            'angkakredit'=> 'required|max:255',
            'tanggal'=> 'required|max:255',
            'author_persentase' => '',

        ]);

        // return $input;

        pelaksanan_penelitian::create($input);

        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(pelaksanan_penelitian $pelaksanan_penelitian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelaksanan_penelitian $pelaksanan_penelitian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {       

    $input = $request->validate([
        'akreditasi_id'=> 'required|max:255',
        'jenispenulis_id'=> 'required|max:255',
        'judul'=> 'required|max:255',
        'jurnal'=> 'required|max:255',
        'link'=> 'required|max:255',
        'jumlah_penulis'=> '',
        'angkakredit'=> 'required|max:255',
        'tanggal'=> 'required|max:255',
    ]);
    $jenispenulis = $input['jenispenulis_id'];
    $angka_kredit = $input['angkakredit'];
    $jumlah_penulis = $input['jumlah_penulis'];

    if($jenispenulis == 4 || $jenispenulis == 5 ){
        $hasil = $angka_kredit / $jumlah_penulis;
    }else{
        $hasil = $angka_kredit;
    };

    $pelaksanan_penelitian = pelaksanan_penelitian::findOrFail($id);
    $pelaksanan_penelitian->akreditasi_id = $input['akreditasi_id'];
    $pelaksanan_penelitian->jenispenulis_id = $input['jenispenulis_id'];
    $pelaksanan_penelitian->judul = $input['judul'];
    $pelaksanan_penelitian->jurnal = $input['jurnal'];
    $pelaksanan_penelitian->link = $input['link'];
    $pelaksanan_penelitian->jumlah_penulis = $input['jumlah_penulis'];
    $pelaksanan_penelitian->angkakredit = $hasil;
    $pelaksanan_penelitian->tanggal = $input['tanggal'];





    dd($pelaksanan_penelitian);

    // $pelaksanan_penelitian->save();

    // return redirect()->back()->with('message', 'Data berhasil disimpan');


 
        // $input = $request->validate([
        //     'akreditasi_id'=> 'required|max:255',
        //     'jenispenulis_id'=> 'required|max:255',
        //     'judul'=> 'required|max:255',
        //     'jurnal'=> 'required|max:255',
        //     'link'=> 'required|max:255',
        //     'jumlah_penulis'=> '',
        //     'angkakredit'=> 'required|max:255',
        //     'tanggal'=> 'required|max:255',
        // ]);   

        // $pelaksanan_penelitian = pelaksanan_penelitian::findOrFail($id);

        // $pelaksanan_penelitian->update($input);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        pelaksanan_penelitian::destroy($id);
        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }
}
