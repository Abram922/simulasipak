<?php

namespace App\Http\Controllers;

use App\Models\KomponenPenelitian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KomponenPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komponenpenelitian = KomponenPenelitian::all();
        return view('/admin/komponen/penelitian',[
            'komponenpenelitian' => $komponenpenelitian
        ]);
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
            'komponenkegiatan' => 'required',
            'angkakredit'=> 'required',
            'bukti_kegiatan'=> 'required',
            'batas_maksimal_diakui'=> 'required'
        ]);

        $penelitian = new KomponenPenelitian([
            'komponenkegiatan' => $input['komponenkegiatan'],
            'angkakredit' => $input['angkakredit'],
            'bukti_kegiatan' => $input['bukti_kegiatan'],
            'batas_maksimal_diakui' => $input['batas_maksimal_diakui'],
        ]);

        dd($penelitian);



        $penelitian->save();
        return redirect()->back()->with('message', 'Data berhasil direkam');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(KomponenPenelitian $komponenPenelitian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KomponenPenelitian $komponenPenelitian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'komponenkegiatan' => 'required',
            'angkakredit'=> 'required',
            'bukti_kegiatan'=> 'required',
            'batas_maksimal_diakui'=> 'required'
        ]);
    
        $penelitian = KomponenPenelitian::findOrFail($id);
        $penelitian->komponenkegiatan = $input['komponenkegiatan'];
        $penelitian->angkakredit = $input['angkakredit'];
        $penelitian->bukti_kegiatan = $input['bukti_kegiatan'];
        $penelitian->batas_maksimal_diakui = $input['batas_maksimal_diakui'];
        $penelitian->save();
    
        return redirect()->back()->with('message', 'Data berhasil direkam');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $komponenpenelitian = KomponenPenelitian::findOrFail($id);
        $komponenpenelitian->delete();
        return redirect()->back()->with('message', 'Data Berhasi Dihapus');

    }
}
