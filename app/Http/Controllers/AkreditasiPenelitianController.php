<?php

namespace App\Http\Controllers;

use App\Models\akreditasi_penelitian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkreditasiPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akreditasi_penelitian = akreditasi_penelitian::all();
        return view('.admin.pendukung.akreditasipenelitian',['akreditasi_penelitian' => $akreditasi_penelitian]);
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
            'akreditasi' => 'required',
            'nilai' => 'required'
        ]);

        $akreditasi = new akreditasi_penelitian ([
            'akreditasi' => $input['akreditasi'],
            'nilai' => $input['nilai'],
        ]);

        $akreditasi->save();
        return redirect()->back()->with('message', 'Data berhasil direkam');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(akreditasi_penelitian $akreditasi_penelitian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(akreditasi_penelitian $akreditasi_penelitian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'akreditasi' => 'required',
            'nilai' => 'required'
        ]);
    
        $akreditasi = akreditasi_penelitian::findOrFail($id);
        $akreditasi->update($input);    
        return redirect()->back()->with('message', 'Data berhasil di ubah');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $semester = akreditasi_penelitian::findOrFail($id);
        $semester->delete();

        return redirect()->back()->with('message', 'Data berhasil direkam');

    
    }
}
