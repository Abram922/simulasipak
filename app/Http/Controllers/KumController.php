<?php

namespace App\Http\Controllers;

use App\Models\kum;
use App\Http\Controllers\Controller;
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
        $strata_pendidikan = stratapendidikan::all();


        return view('.user.perhitungan', compact('strata_pendidikan'));
        
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
            'id_jabatan_dituju' => 'required'
        ]);


        $input['id_user'] = auth()->user()->id;

        kum::create($input); 


        return redirect()->route('userhome');
         

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kum = kum::find($id);
        $strata_pendidikan = stratapendidikan::all();
        return view('.user.perhitungan', ['kum' => $kum, 'strata_pendidikan' => $strata_pendidikan]);     

        
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
    public function destroy(kum $kum)
    {
        //
    }
}
