<?php

namespace App\Http\Controllers;

use App\Models\kum;
use App\Http\Controllers\Controller;
use App\Models\jenis_pelaksanan_pendidikan;
use App\Models\pelaksanaan_pendidikan;
use App\Models\pendidikan;
use App\Models\semester;
use App\Models\stratapendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'judul' => 'required',
            'id_jabatan_sekarang' => 'required',
            'id_jabatan_dituju' => 'required',
            
        ]);


        $input['id_user'] = auth()->user()->id;

        kum::create($input); 
        return redirect()->back()->with('message', 'Data berhasil disimpan');

         

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kum = kum::find($id);
        $strata_pendidikan = stratapendidikan::all();
        $jenis_pelaksanaan_pendidikan = jenis_pelaksanan_pendidikan::all();
        $semester = semester::all();
        
        $pendidikan = pendidikan::where('kum_id', $kum->id)->get();
        $pelaksanaan_pendidikan = pelaksanaan_pendidikan::where('kum_id', $kum->id)->get();
        return view('.user.perhitungan', 
                    ['kum' => $kum, 
                    'strata_pendidikan' => $strata_pendidikan, 
                    'pendidikan'=>$pendidikan, 
                    'semester'=>$semester, 
                    'jenis_pelaksanaan_pendidikan' => $jenis_pelaksanaan_pendidikan,
                    'pelaksanaan_pendidikan' =>$pelaksanaan_pendidikan]);     

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kum $kum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kum $kum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        pendidikan::destroy($id);
        
        return redirect()->back()->with('message', 'Data Berhasi Dihapus');
                
    }
}
