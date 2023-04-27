<?php

namespace App\Http\Controllers;

use App\Models\pelaksanaan_pendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelaksanaanPendidikanController extends Controller
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
            'kum_id' => '',
            'idjenispelaksanaan' => 'required',
            'semester_id' => 'required',
            'nama_kegiatan' => 'required|max:255',
            'tempat_instansi' => 'required|string',
            'sks' => '',
            'jumlah_kelas' => '', 
            'jumlah_angka_kredit' => '',
            'volume_dosen'=> '',
  
        ]);

  
        if ($buktiunsurpdp = $request->file('bukti')) {
            $destinationPath = 'bukti_unsur_utama/pelaksanaan_pendidikan/';
            $profileImage = date('YmdHis') . "." . $buktiunsurpdp->getClientOriginalExtension();
            $buktiunsurpdp->move($destinationPath, $profileImage);
            $input['bukti'] = "$profileImage";
        }

        pelaksanaan_pendidikan::create($input);

        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelaksanaan_pendidikan $pelaksanaan_pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelaksanaan_pendidikan $pelaksanaan_pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pelaksanaan_pendidikan $pelaksanaan_pendidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelaksanaan_pendidikan $pelaksanaan_pendidikan)
    {
        //
    }
}
