<?php

namespace App\Http\Controllers;

use App\Models\kum;
use App\Http\Controllers\Controller;
use App\Models\akreditasi_penelitian;
use App\Models\dokumenpenunjang;
use App\Models\jenis_pelaksanan_pendidikan;
use App\Models\komponendokumenpenunjang;
use App\Models\komponenpm;
use App\Models\pelaksanaan_pendidikan;
use App\Models\pelaksanaan_pm;
use App\Models\pelaksanan_penelitian;
use App\Models\pendidikan;
use App\Models\penulis;
use App\Models\semester;
use App\Models\stratapendidikan;
use Database\Seeders\akreditasi_penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KumController extends Controller
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
        $input = $request->validate([
            'judul' => 'required',
            'id_jabatan_sekarang' => 'required',
            'id_jabatan_dituju' => 'required',
            
        ]);


        $input['id_user'] = auth()->user()->id;

        kum::create($input); 
        return redirect()->back()->with('message', 'Data berhasil disimpan');

         

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kum = kum::find($id);
        $strata_pendidikan = stratapendidikan::all();
        $jenis_pelaksanaan_pendidikan = jenis_pelaksanan_pendidikan::all();
        $semester = semester::all();
        $jenispenulis = penulis::all();
        $akreditasi = akreditasi_penelitian::all();
        $komponenpm = komponenpm::all();
        $komponendokumenpenunjang = komponendokumenpenunjang::all();



        //menampilkan data berdasarkan kum_id
        $pendidikan = pendidikan::where('kum_id', $kum->id)->get();
        $pelaksanaan_pendidikan = pelaksanaan_pendidikan::where('kum_id', $kum->id)->get();
        $pelaksanan_penelitian = pelaksanan_penelitian::where('kum_id', $kum->id)->get();
        $pelaksanaan_pm = pelaksanaan_pm::where('kum_id', $kum->id)->get();
        $dokumenpenunjang = dokumenpenunjang::where('kum_id', $kum->id)->get();

        //sum
        $sumpelaksanaanpendidikan = pelaksanaan_pendidikan::where('kum_id', $kum->id)->sum('jumlah_angka_kredit');
        $sumpelaksanaanpenelitian = pelaksanan_penelitian::where('kum_id', $kum->id)->sum('angkakredit');
        $sumpelaksanaanpm = pelaksanaan_pm::where('kum_id', $kum->id)->sum('angkakreditpm');
        $sumdp = dokumenpenunjang::where('kum_id', $kum->id)->sum('angkakredit_dp');

        //
        $kum_id = DB::table('kums')
        ->where('id_user', auth()->user()->id)
        ->first();


        //
        $result = DB::table('kums')
        ->join('pelaksanaan_pendidikans', 'kums.id', '=', 'pelaksanaan_pendidikans.kum_id')
        ->select('kums.id', DB::raw('SUM(pelaksanaan_pendidikans.jumlah_angka_kredit) as total_ak'))
        ->groupBy('id', 'judul')
        ->where( 'id_user', auth()->user()->id)
        ->get();



        return view('.user.perhitungan', 
                    ['kum' => $kum, 
                    'strata_pendidikan' => $strata_pendidikan, 
                    'pendidikan'=>$pendidikan, 
                    'semester'=>$semester, 
                    'jenis_pelaksanaan_pendidikan' => $jenis_pelaksanaan_pendidikan,
                    'pelaksanaan_pendidikan' =>$pelaksanaan_pendidikan,
                    'jenispenulis' => $jenispenulis,
                    'akreditasi' => $akreditasi,
                    'pelaksanan_penelitian' =>$pelaksanan_penelitian,
                    'pelaksanaan_pm' =>$pelaksanaan_pm,
                    'komponenpm' =>$komponenpm,
                    'komponendokumenpenunjang' => $komponendokumenpenunjang,
                    'dokumenpenunjang' => $dokumenpenunjang,
                    'sumpelaksanaanpendidikan' => $sumpelaksanaanpendidikan,
                    'sumpelaksanaanpenelitian' => $sumpelaksanaanpenelitian,
                    'sumpelaksanaanpm' => $sumpelaksanaanpm,
                    'sumdp' =>$sumdp
                ]);     

        
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
    public function destroy($id)
    {
        pendidikan::destroy($id);
        
        return redirect()->back()->with('message', 'Data Berhasi Dihapus');
                
    }
}
