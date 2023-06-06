<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lampiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function pendidikan(){


        $idUser = Auth::id();

        $result = DB::table('users')
            ->join('kums', 'users.id', '=', 'kums.id_user')
            ->where('kums.id_user', $idUser)
            ->pluck('kums.id')
            ->toArray();
        
        $pendidikan = [];
        
        foreach ($result as $kumId) {
            $pendidikanData = DB::table('pendidikans')
                ->where('kum_id', $kumId)
                ->select('bukti')
                ->get();
        
            $pendidikan = array_merge($pendidikan, $pendidikanData->toArray());
        }

        $lampiran = Lampiran::where('id_user', $idUser)
        ->where('jenislampiran', 'pendidikan')
        ->get();

    
        return view('.lampiran.pendidikan', [
             'pendidikan' => $pendidikan,
             'lampiran' => $lampiran
        ]);
    
    }

    public function datapendidikan(){


        $idUser = Auth::id();

        $result = DB::table('users')
            ->join('kums', 'users.id', '=', 'kums.id_user')
            ->where('kums.id_user', $idUser)
            ->pluck('kums.id')
            ->toArray();

        
        $pendidikan = [];
        
        foreach ($result as $kumId) {
            $pendidikanData = DB::table('pelaksanaan_pendidikans')
                ->where('kum_id', $kumId)
                ->select('bukti_pendidikan')
                ->get();
        
            $pendidikan = array_merge($pendidikan, $pendidikanData->toArray());
        }

        $lampiran = Lampiran::where('id_user', $idUser)
        ->where('jenislampiran', 'pelaksanaanpendidikan')
        ->get();
        
    
        return view('.lampiran.pelaksanaanpendidikan', [
             'pendidikan' => $pendidikan,
             'lampiran' => $lampiran
        ]);
    
    }

    public function datapenelitian(){
        $idUser = Auth::id();

        $result = DB::table('users')
            ->join('kums', 'users.id', '=', 'kums.id_user')
            ->where('kums.id_user', $idUser)
            ->pluck('kums.id')
            ->toArray();

        $pelaksanan_penelitians = [];
        $haki=[];

                foreach ($result as $kumId) {
            $hakidata = DB::table('penelitian_hakidankaryas')
                ->where('id_kum', $kumId)
                ->select('bukti')
                ->get();
        
            $haki = array_merge($haki, $hakidata->toArray());
        }
        
        foreach ($result as $kumId) {
            $pelaksanan_penelitiansData = DB::table('pelaksanan_penelitians')
                ->where('kum_id', $kumId)
                ->select('link')
                ->get();
        
            $pelaksanan_penelitians = array_merge($pelaksanan_penelitians, $pelaksanan_penelitiansData->toArray());
        }

        $lampiran = Lampiran::where('id_user', $idUser)
        ->where('jenislampiran', 'penelitian')
        ->get();

    
        return view('.lampiran.penelitian', [
             'pelaksanan_penelitians' => $pelaksanan_penelitians,
             'haki' => $haki,
             'lampiran' => $lampiran,
        ]);


    }

    public function datapm(){

        $idUser = Auth::id();

        $result = DB::table('users')
            ->join('kums', 'users.id', '=', 'kums.id_user')
            ->where('kums.id_user', $idUser)
            ->pluck('kums.id')
            ->toArray();

        $pelaksanan_pm = [];
        
        foreach ($result as $kumId) {
            $pelaksanan_pmData = DB::table('pelaksanaan_pms')
                ->where('kum_id', $kumId)
                ->select('buktifisik')
                ->get();
        
            $pelaksanan_pm = array_merge($pelaksanan_pm, $pelaksanan_pmData->toArray());
        }

        $lampiran = Lampiran::where('id_user', $idUser)
        ->where('jenislampiran', 'pengabdiankepadamasyarakat')
        ->get();

    
        return view('.lampiran.pm', [
             'pelaksanan_pm' => $pelaksanan_pm,
             'lampiran' => $lampiran,
        ]);

 
    }

    public function datapenunjang(){
        $idUser = Auth::id();

        $result = DB::table('users')
            ->join('kums', 'users.id', '=', 'kums.id_user')
            ->where('kums.id_user', $idUser)
            ->pluck('kums.id')
            ->toArray();

        $dokumenpenunjangs = [];
        
        foreach ($result as $kumId) {
            $dokumenpenunjangsData = DB::table('pelaksanaan_pms')
                ->where('kum_id', $kumId)
                ->select('buktifisik')
                ->get();
        
            $dokumenpenunjangs = array_merge($dokumenpenunjangs, $dokumenpenunjangsData->toArray());
        }

        $lampiran = Lampiran::where('id_user', $idUser)
        ->where('jenislampiran', 'penunjang')
        ->get();

    
        return view('.lampiran.penunjang', [
             'dokumenpenunjangs' => $dokumenpenunjangs,
             'lampiran' => $lampiran,

        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'jenislampiran' => 'required'
        ]);

        $input['id_user'] = auth()->user()->id;

        if ($image = $request->file('file')) {
            $destinationPath = 'lampiran/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file'] = "$profileImage";
        }

        

        Lampiran::create($input);
        return redirect()->back()->with('message', 'Data berhasil disimpan');
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
    public function destroy($id)
    {
        Lampiran::destroy($id);
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
