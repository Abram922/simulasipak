<?php

namespace App\Http\Controllers;

use App\Models\kum;
use App\Models\pelaksanaan_pendidikan;
use App\Models\pendidikan;
use App\Http\Controllers\Controller;
use App\Models\stratapendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PendidikanController extends Controller
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
        $inputs = $request->input('inputs');

        foreach ($inputs as $i => $input) {
            $validator = Validator::make($input, [
                'strata_id' => 'required|max:255',
                'tanggal' => 'required|date_format:Y-m-d',
                'institusi' => 'required|max:255',
                'kum_id'=> 'required',
                'bukti' => 'file'
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }    
            $pelaksanaanPendidikan = new pendidikan([
                'strata_id' => $input['strata_id'],
                'tanggal' => $input['tanggal'],
                'institusi' => $input['institusi'],
                'kum_id' => $input['kum_id'],
            ]);
    
            if ($image = $request->file('inputs.'.$i.'.bukti')) {
                $destinationPath = 'bukti_unsur_utama/pendidikan/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $pelaksanaanPendidikan->bukti = $profileImage;
            }    
            $pelaksanaanPendidikan->save();
        }
    
        return back()->with('success', 'Data berhasil disimpan');   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kum = kum::find($id);
        $pendidikan = pendidikan::where('kum_id', $kum->id)->get();
        $strata_pendidikan = stratapendidikan::all();

        return view('.user.board.boardpendidikan',[
            'kum' =>$kum,
            'pendidikan' => $pendidikan,
            'strata_pendidikan' => $strata_pendidikan
        ]);
    }

    public function kumpulan_pendidikan($id){
        $kum = kum::find($id);
        $pendidikan = pendidikan::where('kum_id', $kum->id)->get();

        return view('.user.board.boardpengajaran',[
            'kum' =>$kum,
            'pendidikan' => $pendidikan
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pendidikan $pendidikan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $input = $request->validate([
            'strata_id' => 'required|max:255',
            'tanggal' => 'required|date_format:Y-m-d',
            'institusi' => 'required|max:255'
        ]);

        if ($image = $request->file('bukti')) {
            $destinationPath = 'bukti_unsur_utama/pendidikan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['bukti'] = "$profileImage";
        }else{
            unset($input['bukti']);
        }

        $pendidikan = pendidikan::findOrFail($id);

        $pendidikan->update($input);

        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        pendidikan::destroy($id);
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
