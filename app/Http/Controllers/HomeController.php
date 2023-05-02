<?php

namespace App\Http\Controllers;

use App\Models\dokumenpenunjang;
use App\Models\jabatan;
use App\Models\kum;
use App\Models\pelaksanaan_pendidikan;
use App\Models\pelaksanaan_pm;
use App\Models\pelaksanan_penelitian;
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
        return view('.user.home');
    }

    public function boardpak(){

        // $result = DB::table('kums')
        // ->join('pelaksanaan_pendidikans', 'kums.id', '=', 'pelaksanaan_pendidikans.kum_id')
        // ->select('kums.judul', 'pelaksanaan_pendidikans.jumlah_angka_kredit')
        // ->get();

        $result = DB::table('kums')
        ->join('pelaksanaan_pendidikans', 'kums.id', '=', 'pelaksanaan_pendidikans.kum_id')
        ->select('kums.judul', DB::raw('SUM(pelaksanaan_pendidikans.jumlah_angka_kredit) as total_ak'))
        ->groupBy('kums.id', 'kums.judul')
        ->get();


        $jabatanpref = jabatan::all();
        $jabatanafter = jabatan::all();
        $kum = DB::table('kums')->where('id_user', auth()->user()->id)->get();  

        return view('.user.menuperhitungan', compact('jabatanpref', 'jabatanafter', 'kum', 'result'));
    }

    
}
