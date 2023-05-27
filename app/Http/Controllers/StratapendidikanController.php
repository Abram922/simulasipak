<?php

namespace App\Http\Controllers;

use App\Models\stratapendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StratapendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stratapendidikan = stratapendidikan::all();
        return view('.admin.komponen.stratapendidikan',[
            'stratapendidikan' => $stratapendidikan
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
            'strata' => 'required',
            'nilai'=> 'required',
            'keterangan'=> 'required',
            'batas_maksimal_diakui'=> 'required'
        ]);

        $penunjang = new stratapendidikan ([
            'strata' => $input['strata'],
                'nilai' => $input['nilai'],
                'keterangan' => $input['keterangan'],
                'batas_maksimal_diakui' => $input['batas_maksimal_diakui'],
        ]);



        $penunjang->save();
        return redirect()->back()->with('message', 'Data berhasil direkam');
    }

    /**
     * Display the specified resource.
     */
    public function show(stratapendidikan $stratapendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stratapendidikan $stratapendidikan)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'strata' => 'required',
            'nilai'=> 'required',
            'keterangan'=> 'required',
            'batas_maksimal_diakui'=> 'required'
        ]);
    
        $strata = stratapendidikan::findOrFail($id);
        $strata->strata = $input['strata'];
        $strata->nilai = $input['nilai'];
        $strata->keterangan = $input['keterangan'];
        $strata->batas_maksimal_diakui = $input['batas_maksimal_diakui'];
        $strata->save();
    
        return redirect()->back()->with('message', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stratapendidikan = stratapendidikan::findOrFail($id);
        $stratapendidikan->delete();

        return redirect()->back()->with('message', 'Data berhasil direkam');

    }
}
