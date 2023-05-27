<?php

namespace App\Http\Controllers;

use App\Models\jenis_pelaksanan_pendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisPelaksananPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        'jenispelaksanaan' => '',
        'Lektor_Kepala'=> '',
        'angka_kredit'=> '',
        'bukti_kegiatan'=> '',
        'batas_maksimal_diakui'=> ''
        ]);

        jenis_pelaksanan_pendidikan::create($input);
        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis_pelaksanan_pendidikan $jenis_pelaksanan_pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis_pelaksanan_pendidikan $jenis_pelaksanan_pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenispelaksanaan' => '',
            'Lektor_Kepala' => '',
            'angka_kredit' => '',
            'bukti_kegiatan' => '',
            'batas_maksimal_diakui' => ''
        ]);
    
        $jenispelaksanaan = $request->input('jenispelaksanaan');
        $Lektor_Kepala = $request->input('Lektor_Kepala');
        $angka_kredit = $request->input('angka_kredit');
        $bukti_kegiatan = $request->input('bukti_kegiatan');
        $batas_maksimal_diakui = $request->input('batas_maksimal_diakui');
    
        $komponenpendidikan = jenis_pelaksanan_pendidikan::findOrFail($id);
        $komponenpendidikan->jenispelaksanaan = $jenispelaksanaan;
        $komponenpendidikan->Lektor_Kepala = $Lektor_Kepala;
        $komponenpendidikan->angka_kredit = $angka_kredit;
        $komponenpendidikan->bukti_kegiatan = $bukti_kegiatan;
        $komponenpendidikan->batas_maksimal_diakui = $batas_maksimal_diakui;
        $komponenpendidikan->save();
    
        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $komponenpendidikan = jenis_pelaksanan_pendidikan::findOrFail($id);
        $komponenpendidikan->delete();
        return redirect()->back()->with('message', 'Data Berhasi Dihapus');
        
    }
}
