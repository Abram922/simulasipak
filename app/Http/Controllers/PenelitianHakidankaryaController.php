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
            //    'kum_id' => 'required',
            //    'id_semester' => 'required',
            //    'id_jeniskarya' => 'required',
            //    'bukti' => 'file'
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            $id_jeniskarya = $input['id_jeniskarya'];
    
            $jenisPelaksanaan = KomponenPenelitian::find($id_jeniskarya);
    
            $karya = new penelitian_hakidankarya([
               'id_kum' => $input['id_kum'],
               'id_jeniskarya' => $input['id_jeniskarya'],
               'id_semester' => $input['id_semester'],                
               'jumlah_angka_kredit' => $jenisPelaksanaan->angkakredit

            ]);
    
            if ($image = $request->file('inputs.'.$i.'.bukti')) {
                $destinationPath = 'bukti_unsur_utama/pelaksanaan_pm/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $karya->bukti = $profileImage;
            }
            return $karya;
            // $karya->save();
        }
        
       

        // return back()->with('success', 'Data berhasil disimpan');
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
    public function update(Request $request, penelitian_hakidankarya $penelitian_hakidankarya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penelitian_hakidankarya $penelitian_hakidankarya)
    {
        //
    }
}
