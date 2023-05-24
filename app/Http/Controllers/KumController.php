<?php

namespace App\Http\Controllers;

use App\Models\kum;
use App\Http\Controllers\Controller;
use App\Models\akreditasi_penelitian;
use App\Models\dokumenpenunjang;
use App\Models\jabatan;
use App\Models\jenis_pelaksanan_pendidikan;
use App\Models\komponendokumenpenunjang;
use App\Models\KomponenPenelitian;
use App\Models\komponenpm;
use App\Models\pelaksanaan_pendidikan;
use App\Models\pelaksanaan_pm;
use App\Models\pelaksanan_penelitian;
use App\Models\pendidikan;
use App\Models\pengajaran;
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
            'id_jabatan_dituju' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $njs = $request->input('id_jabatan_sekarang');
                    $njd = $value;
                    
                    $nj1 = jabatan::find($njs);
                    $nj2 = jabatan::find($njd);
                    
                    $h1 = $nj1->angkaKreditKumulatif;
                    $h2 = $nj2->angkaKreditKumulatif;
    
                    if ($h2 <= $h1) {
                        $fail('Nilai Angka Kredit Kumulatif Jabatan yang Dituju harus lebih besar dari Jabatan Saat Ini.');
                    }
                },
            ],
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
        $komponenpenelitian = KomponenPenelitian::all();

        //menampilkan data berdasarkan kum_id
        $pendidikan = pendidikan::where('kum_id', $kum->id)->get();
        $pelaksanaan_pendidikan = pelaksanaan_pendidikan::where('kum_id', $kum->id)->get();
        $pelaksanan_penelitian = pelaksanan_penelitian::where('kum_id', $kum->id)->get();
        $pelaksanaan_pm = pelaksanaan_pm::where('kum_id', $kum->id)->get();
        $dokumenpenunjang = dokumenpenunjang::where('kum_id', $kum->id)->get();
        $poinpendidikan = DB::table('pendidikans')
        ->join('stratapendidikans', 'pendidikans.strata_id', '=', 'stratapendidikans.id')
        ->select('pendidikans.id', 'stratapendidikans.nilai')
        ->groupBy('pendidikans.id', 'stratapendidikans.nilai')
        ->where('kum_id', $kum->id)
        ->orderBy('stratapendidikans.nilai', 'desc')        
        ->max('stratapendidikans.nilai');
    
        //sum
        $sumpendidikan = pelaksanaan_pendidikan::where('kum_id', $kum->id)->sum('jumlah_angka_kredit');
        $sumpengajaran = pengajaran::where('id_kum', $kum->id)->sum('jumlah_angka_kredit');   
        $sumpelaksanaanpendidikan = $sumpendidikan + $sumpengajaran;

        $sumpelaksanaanpenelitian = pelaksanan_penelitian::where('kum_id', $kum->id)->sum('angkakredit');
        $sumpelaksanaanpm = pelaksanaan_pm::where('kum_id', $kum->id)->sum('angkakreditpm');
        $sumdp = dokumenpenunjang::where('kum_id', $kum->id)->sum('angkakredit_dp');


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
                    'sumdp' =>$sumdp,
                    'poinpendidikan' =>$poinpendidikan,
                    'komponenpenelitian' => $komponenpenelitian
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
