<?php

namespace App\Http\Controllers;

use App\Models\dokumenpenunjang;
use App\Models\jabatan;
use App\Models\jenis_pelaksanan_pendidikan;
use App\Models\komponenpm;
use App\Models\kum;
use App\Models\pelaksanaan_pendidikan;
use App\Models\pelaksanaan_pm;
use App\Models\pelaksanan_penelitian;
use App\Models\stratapendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('.user.home');
    }

    public function adminhome(){
        return view('.admin.home');
    }
    public function userhome(){

        $strata_pendidikan = stratapendidikan::all();
        $jenis_pelaksanaan_pendidikan = jenis_pelaksanan_pendidikan::all();
        $komponenpm = komponenpm::all();

        return view('.user.home',[
            'strata_pendidikan' =>$strata_pendidikan,
            'jenis_pelaksanaan_pendidikan' =>$jenis_pelaksanaan_pendidikan,
            'komponenpm' =>$komponenpm,
        ]);
    }

    public function boardpak(){

        // $result = DB::table('kums')
        // ->join('pelaksanaan_pendidikans', 'kums.id', '=', 'pelaksanaan_pendidikans.kum_id')
        // ->select('kums.judul', 'pelaksanaan_pendidikans.jumlah_angka_kredit')
        // ->get();

        $kum_x = DB::table('kums')->where('id_user', auth()->user()->id)->first(); 
        $kum = DB::table('kums')->where('id_user', auth()->user()->id)->get();  


        $result = DB::table('kums')
        ->join('pelaksanaan_pendidikans', 'kums.id', '=', 'pelaksanaan_pendidikans.kum_id')
        ->select('kums.id', DB::raw('SUM(pelaksanaan_pendidikans.jumlah_angka_kredit) as total_ak'))
        ->groupBy('id', 'judul')
        ->where( 'id_user', auth()->user()->id)
        ->get();


        $jabatanpref = jabatan::all();
        $jabatanafter = jabatan::all(); 

        return view('.user.menuperhitungan', compact('jabatanpref', 'jabatanafter', 'kum', 'result'));
    }

    
}
