<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = jabatan::all();
        return view('.admin.pendukung.jabatan',['jabatan' => $jabatan]);
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
            'jabatan' => 'required',
            'angkaKreditKumulatif' => 'required',
            'pelaksanaanPendidikan' => 'required',
            'pelaksanaanPenelitian' => 'required',
            'pelaksanaanPengabdianMasyarakat' => 'required',
            'penunjang' => 'required'

        ]);

        $jabatan = new jabatan ([
            'jabatan' => $input['jabatan'],
            'angkaKreditKumulatif' => $input['angkaKreditKumulatif'],
            'pelaksanaanPendidikan' => $input['pelaksanaanPendidikan'],
            'pelaksanaanPenelitian' => $input['pelaksanaanPenelitian'],
            'pelaksanaanPengabdianMasyarakat' => $input['pelaksanaanPengabdianMasyarakat'],
            'penunjang' => $input['penunjang'],
        ]);

        $jabatan->save();
        return redirect()->back()->with('message', 'Data berhasil direkam');
    }

    /**
     * Display the specified resource.
     */
    public function show(jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'jabatan' => 'required',
            'angkaKreditKumulatif' => 'required',
            'pelaksanaanPendidikan' => 'required',
            'pelaksanaanPenelitian' => 'required',
            'pelaksanaanPengabdianMasyarakat' => 'required',
            'penunjang' => 'required'
        ]);
    
        $jabatan = jabatan::findOrFail($id);
        $jabatan->update($input);    
        return redirect()->back()->with('message', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jabatan = jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->back()->with('message', 'Data berhasil direkam');
    }
}
