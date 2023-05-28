<?php

namespace App\Http\Controllers;

use App\Models\penulis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penulis = penulis::all();
        return view('.admin.pendukung.penulis',['penulis' => $penulis]);
    
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
            'jenispenulis' => '',
            'persentase_skor'=> '',
            'penulis_khusus'=> '',
            'note'=> ''
        ]);

        $penunjang = new penulis ([
                'jenispenulis' => $input['jenispenulis'],
                'persentase_skor' => $input['persentase_skor'],
                'note' => $input['note'],
                'penulis_khusus' => $input['penulis_khusus'],
        ]);



        $penunjang->save();
        return redirect()->back()->with('message', 'Data berhasil direkam');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(penulis $penulis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penulis $penulis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'jenispenulis' => 'required',
            'persentase_skor'=> 'required',
            'note'=> 'required',
            'penulis_khusus'=> ''
        ]);
    
        $penulis_khusus = $request->input('penulis_khusus');
        $penulis = penulis::findOrFail($id);
        $penulis->penulis_khusus = $penulis_khusus;
        $penulis->save();

        $penulis->update($input);    
        return redirect()->back()->with('message', 'Data berhasil di ubah');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penulis = penulis::findOrFail($id);
        $penulis->delete();

        return redirect()->back()->with('message', 'Data berhasil direkam');

    
    }
}
