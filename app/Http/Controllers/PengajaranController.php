<?php

namespace App\Http\Controllers;

use App\Models\pengajaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajaranController extends Controller
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
        $inputs = $request->input('inputs');

        foreach ($inputs as $input) {
            $pengajaran = new Pengajaran();
            $pengajaran->instansi = $input['instansi'];
            $pengajaran->id_semester = $input['id_semester'];
            $pengajaran->kode_matakuliah = $input['kode_matakuliah'];
            $pengajaran->matakuliah = $input['matakuliah'];
            $pengajaran->nama_kelas_pengajaran = $input['nama_kelas_pengajaran'];
            $pengajaran->volume_dosen_pengajar = $input['volume_dosen_pengajar'];
            $pengajaran->sks_pengajaran = $input['sks_pengajaran'];
            $pengajaran->id_kum = $input['id_kum'];

            //perhitungan 
            $volumeDosen =floatval($input['volume_dosen_pengajar'])  ;
            $sks = floatval($input['sks_pengajaran']) ;

            $hasil = (1 / $volumeDosen) * $sks;

            $pengajaran->jumlah_angka_kredit = floatval($hasil) ;                  
            $pengajaran->save();
        }


        return back()->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pengajaran $pengajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengajaran $pengajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengajaran $pengajaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengajaran $pengajaran)
    {
        //
    }
}
