<?php

namespace App\Http\Controllers;

use App\Models\pelaksanaan_pm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelaksanaanPmController extends Controller
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
            'komponenpm_id' => 'required',
            'nama' => 'required',
            'bentuk' => 'required|max:255',
            'tempat_instansi' => 'required|string',
            'semester' => '',
            'angkakredit' => '',
        ]);

  
        if ($buktiunsurpdp = $request->file('bukti')) {
            $destinationPath = 'bukti_unsur_utama/pelaksanaan_pm/';
            $profileImage = date('YmdHis') . "." . $buktiunsurpdp->getClientOriginalExtension();
            $buktiunsurpdp->move($destinationPath, $profileImage);
            $input['bukti'] = "$profileImage";
        }
        return $input;

        // pelaksanaan_pm::create($input);

        // return redirect()->back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelaksanaan_pm $pelaksanaan_pm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelaksanaan_pm $pelaksanaan_pm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pelaksanaan_pm $pelaksanaan_pm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelaksanaan_pm $pelaksanaan_pm)
    {
        //
    }
}
