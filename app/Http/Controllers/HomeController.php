<?php

namespace App\Http\Controllers;

use App\Models\dokumenpenunjang;
use App\Models\jabatan;
use App\Models\jenis_pelaksanan_pendidikan;
use App\Models\komponendokumenpenunjang;
use App\Models\KomponenPenelitian;
use App\Models\komponenpm;
use App\Models\kum;
use App\Models\pengajaran;
use App\Models\User;
use App\Models\pelaksanaan_pendidikan;
use App\Models\pelaksanaan_pm;
use App\Models\pelaksanan_penelitian;
use App\Models\pendidikan;
use App\Models\stratapendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $user = User::where('id', Auth::user()->id)->get();
        $strata_pendidikan = stratapendidikan::all();
        $jenis_pelaksanaan_pendidikan = jenis_pelaksanan_pendidikan::all();
        $komponenpm = komponenpm::all();
        $komponendp = komponendokumenpenunjang::all();        
        $komponenpenelitian = KomponenPenelitian::all();
        $id = Auth::id();
        $kumterakhirId = kum::where('id_user', $id)->latest()->pluck('id')->first();
        $kumterakhir = kum::where('id_user', $id)->latest()->first();
        
        $strata_id = pendidikan::where('kum_id', $kumterakhirId)->max('strata_id');
        $sumx = stratapendidikan::where('id', $strata_id)->pluck('nilai')->first();


        $sumpendidikan = pelaksanaan_pendidikan::where('kum_id', $kumterakhirId)->sum('jumlah_angka_kredit');
        $sumpengajaran = pengajaran::where('id_kum', $kumterakhirId)->sum('jumlah_angka_kredit');   
        $sumpelaksanaanpendidikan = $sumpendidikan + $sumpengajaran;
        $sumpelaksanaanpenelitian = pelaksanan_penelitian::where('kum_id', $kumterakhirId)->sum('angkakredit');
        $sumpelaksanaanpm = pelaksanaan_pm::where('kum_id', $kumterakhirId)->sum('angkakreditpm');
        $sumdp = dokumenpenunjang::where('kum_id', $kumterakhirId)->sum('angkakredit_dp');
        return view('.user.home',[
            'strata_pendidikan' =>$strata_pendidikan,
            'jenis_pelaksanaan_pendidikan' =>$jenis_pelaksanaan_pendidikan,
            'komponenpm' =>$komponenpm,
            'komponendp' =>$komponendp,
            'komponenpenelitian' =>$komponenpenelitian,
            'user' =>$user,
            'sumpelaksanaanpendidikan' =>$sumpelaksanaanpendidikan,
            'sumpelaksanaanpenelitian' =>$sumpelaksanaanpenelitian,
            'sumpelaksanaanpm' =>$sumpelaksanaanpm,
            'sumdp' =>$sumdp,
            'sumx' =>$sumx,
            'kumterakhir' =>$kumterakhir,
        ]);
    }


    public function userhome(){

        $user = User::where('id', Auth::user()->id)->get();
        $strata_pendidikan = stratapendidikan::all();
        $jenis_pelaksanaan_pendidikan = jenis_pelaksanan_pendidikan::all();
        $komponenpm = komponenpm::all();
        $komponendp = komponendokumenpenunjang::all();        
        $komponenpenelitian = KomponenPenelitian::all();

        $id = Auth::id();
        
        $kumterakhirId = kum::where('id_user', $id)->latest()->pluck('id')->first();
        $kumterakhir = kum::where('id_user', $id)->latest()->first();

        $strata_id = pendidikan::where('kum_id', $kumterakhirId)->max('strata_id');

        $sumx = stratapendidikan::where('id', $strata_id)->pluck('nilai')->first();

        $sumpendidikan = pelaksanaan_pendidikan::where('kum_id', $kumterakhirId)->sum('jumlah_angka_kredit');
        $sumpengajaran = pengajaran::where('id_kum', $kumterakhirId)->sum('jumlah_angka_kredit');   
        $sumpelaksanaanpendidikan = $sumpendidikan + $sumpengajaran;

        $sumpelaksanaanpenelitian = pelaksanan_penelitian::where('kum_id', $kumterakhirId)->sum('angkakredit');
        $sumpelaksanaanpm = pelaksanaan_pm::where('kum_id', $kumterakhirId)->sum('angkakreditpm');
        $sumdp = dokumenpenunjang::where('kum_id', $kumterakhirId)->sum('angkakredit_dp');


        return view('.user.home',[
            'strata_pendidikan' =>$strata_pendidikan,
            'jenis_pelaksanaan_pendidikan' =>$jenis_pelaksanaan_pendidikan,
            'komponenpm' =>$komponenpm,
            'komponendp' =>$komponendp,
            'komponenpenelitian' =>$komponenpenelitian,
            'user' =>$user,
            'sumpelaksanaanpendidikan' =>$sumpelaksanaanpendidikan,
            'sumpelaksanaanpenelitian' =>$sumpelaksanaanpenelitian,
            'sumpelaksanaanpm' =>$sumpelaksanaanpm,
            'sumdp' =>$sumdp,
            'sumx' =>$sumx,
            'kumterakhir' =>$kumterakhir,



        ]);
    }

    public function boardpak(){

        // $result = DB::table('kums')
        // ->join('pelaksanaan_pendidikans', 'kums.id', '=', 'pelaksanaan_pendidikans.kum_id')
        // ->select('kums.judul', 'pelaksanaan_pendidikans.jumlah_angka_kredit')
        // ->get();

        $kum_x = DB::table('kums')->where('id_user', auth()->user()->id)->first(); 
        $kum = kum::where('id_user', auth()->user()->id)->with('jabatanDituju','jabatanSekarang')->get();


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


    /////////////////////////////////////////////////////////ADMIN/////////////////////////////////////////

    public function adminhome(){
        return view('.admin.home');
    }

    public function adminpendidikan(){
        $komponenpendidikan = jenis_pelaksanan_pendidikan::all();
        return view('/admin/komponen/pendidikan',[
            'komponenpendidikan' => $komponenpendidikan
        ]);
    }

    
}
