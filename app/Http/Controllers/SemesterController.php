<?php

namespace App\Http\Controllers;

use App\Models\semester;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semester = semester::all();
        return view('.admin.pendukung.semester',['semester' => $semester]);
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
            'semester' => 'required'
        ]);

        $semesterinput = $input['semester'];




        $semesterganjil = new semester ();
        $semestergenap = new semester ();

            $semesterganjil->semester = "Semester Ganjil TA" . $semesterinput . "/" . $semesterinput+1 ;
            $semestergenap->semester = "Semester Genap TA" . $semesterinput+1 . "/".     $semesterinput+2 ;

        
        $semesterganjil->save();
        $semestergenap->save();
        return redirect()->back()->with('message', 'Data berhasil direkam');
    }

    /**
     * Display the specified resource.
     */
    public function show(semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'semester' => 'required'
        ]);
    
        $semester = semester::findOrFail($id);
        $semester->update($input);    
        return redirect()->back()->with('message', 'Data berhasil di ubah');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $semester = semester::findOrFail($id);
        $semester->delete();

        return redirect()->back()->with('message', 'Data berhasil direkam');

    }
}
