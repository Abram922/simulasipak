<?php

namespace App\Http\Controllers;

use App\Models\komponenpm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KomponenpmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komponenpm = komponenpm::all();
        return view ('/admin/komponen/pengabdian',[
            'komponenpm' => $komponenpm
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

        $pm = new komponenpm([
            'komponenkegiatan' => $input['komponenkegiatan'],
                'angkakredit' => $input['angkakredit'],
                'bukti_kegiatan' => $input['bukti_kegiatan'],
                'batas_maksimal_diakui' => $input['batas_maksimal_diakui'],
        ]);



        $pm->save();
        return redirect()->back()->with('message', 'Data berhasil direkam');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(komponenpm $komponenpm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(komponenpm $komponenpm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, komponenpm $komponenpm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pm = komponenpm::findOrFail($id);
        $pm->delete();

        return redirect()->back()->with('message', 'Data berhasil dihapus');
    
    }
}
