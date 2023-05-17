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
        $input = $request->validate([
            'kum_id.*' => 'required',
            'id_semester.*' => 'required',
            'matakuliah.*' => 'required|max:255',
            'instansi.*' => 'required|string',
            'sks_pengajaran.*' => 'required',
            'kode_matakuliah.*' => 'required', 
            'jumlah_angka_kredit.*' => 'required',
            'volume_dosen_pengajar.*' => 'required',
            'nama_kelas_pengajaran.*' => '',
        ]);
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
