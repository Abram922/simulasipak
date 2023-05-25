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
        //
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
    public function update(Request $request, penulis $penulis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penulis $penulis)
    {
        //
    }
}
