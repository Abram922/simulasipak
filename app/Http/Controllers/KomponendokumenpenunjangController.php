<?php

namespace App\Http\Controllers;

use App\Models\komponendokumenpenunjang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KomponendokumenpenunjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komponenpenunjang = komponendokumenpenunjang::all();
        return view('.admin.komponen.penunjang',[
            'komponenpenunjang' => $komponenpenunjang
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
            'angkakreditmax'=> 'required',
            'bukti_kegiatan'=> 'required',
            'batas_maksimal_diakui'=> 'required'
        ]);

        $penunjang = new komponendokumenpenunjang([
            'komponenkegiatan' => $input['komponenkegiatan'],
                'angkakreditmax' => $input['angkakreditmax'],
                'bukti_kegiatan' => $input['bukti_kegiatan'],
                'batas_maksimal_diakui' => $input['batas_maksimal_diakui'],
        ]);



        $penunjang->save();
        return redirect()->back()->with('message', 'Data berhasil direkam');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(komponendokumenpenunjang $komponendokumenpenunjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(komponendokumenpenunjang $komponendokumenpenunjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, komponendokumenpenunjang $komponendokumenpenunjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = komponendokumenpenunjang::findOrFail($id);
        $id->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapuss');

    }
}
