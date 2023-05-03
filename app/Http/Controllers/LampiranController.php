<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LampiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('.lampiran.index');
    }

    public function datapendidikan(){

        $join = DB::table('pendidikans')
        ->join('kums', 'pendidikans.kum_id', '=', 'kums.id')
        ->select('pendidikans.id', 'kums.id')
        ->groupBy('pendidikans.id', 'kums.id') 
        ->get();

        dd($join);

        // $pendidikan = pendidikan::where('userjabatan_id',$id_userjabatan)->get();
        // return view('lampiran.pendidikan',[
        //     'pendidikan' => $pendidikan
        // ]);
    }

    public function datapenelitian(){

    }

    public function datapm(){
 
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
