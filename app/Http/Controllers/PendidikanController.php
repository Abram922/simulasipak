<?php

namespace App\Http\Controllers;

use App\Models\kum;
use App\Models\pendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendidikanController extends Controller
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
            'strata_id' => 'required|max:255',
            'tanggal' => 'required|date_format:Y-m-d',
            'institusi' => 'required|max:255',
        ]);

        $kum = kum::findOrFail(request()->route('id'));

        $input['kum_id'] = $kum->id;



        if ($image = $request->file('bukti')) {
            $destinationPath = 'bukti_unsur_utama/pendidikan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['bukti'] = "$profileImage";
        }
        pendidikan::create($input);

        return view('.user.perhitungan', ['kum' => $kum]);     


    }

    /**
     * Display the specified resource.
     */
    public function show(pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pendidikan $pendidikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pendidikan $pendidikan)
    {
        //
    }
}
