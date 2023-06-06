<?php

namespace App\Http\Controllers;

use App\Models\penelitian_hakidankarya;
use App\Http\Controllers\Controller;
use App\Models\KomponenPenelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenelitianHakidankaryaController extends Controller
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

        foreach ($inputs as $i => $input) {
            $validator = Validator::make($input, [
               'id_kum' => 'required',
               'id_semester' => 'required',
               'id_jeniskarya' => 'required',
               'judul' => 'required',
               'bukti' => ''
            ]);
            $id_jeniskarya = $input['id_jeniskarya'];
            $jenisPelaksanaan = KomponenPenelitian::find($id_jeniskarya);  

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $karya = new penelitian_hakidankarya([
               'judul' => $input['judul'],
               'id_kum' => $input['id_kum'],
               'id_jeniskarya' => $input['id_jeniskarya'],
               'id_semester' => $input['id_semester'],                
               'jumlah_angka_kredit' => $jenisPelaksanaan->angkakredit

            ]);
    
            if ($image = $request->file('inputs.'.$i.'.bukti')) {
                $destinationPath = 'bukti_unsur_utama/pelaksanaan_penelitian/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $karya->bukti = $profileImage;
            }
            // dd($karya);
            $karya->save();
        }
        $kumId = $input['id_kum'];
        return redirect()->route('pelaksanaanpenelitian.show', $kumId)->with('message', 'Data berhasil disimpan'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(penelitian_hakidankarya $penelitian_hakidankarya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penelitian_hakidankarya $penelitian_hakidankarya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $input = $request->validate([
            'id_semester' => 'required|integer',
            'id_jeniskarya' => 'required|integer',
            'judul' => ''
        ]);

        if ($image = $request->file('bukti')) {
            $destinationPath = 'bukti_unsur_utama/pelaksanaan_penelitian/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['bukti'] = "$profileImage";
        }else{
            unset($input['bukti']);
        }

        $haki = penelitian_hakidankarya::findOrFail($id);


        $haki->update($input);


        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        penelitian_hakidankarya::destroy($id);
        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }
}
