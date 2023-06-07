<?php

namespace App\Http\Controllers;

use App\Models\jenis_pelaksanan_pendidikan;
use App\Models\kum;
use App\Models\pelaksanaan_pendidikan;
use App\Models\pengajaran;
use App\Http\Controllers\Controller;
use App\Models\semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengajaranController extends Controller
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



    public function store(Request $request)
{
    $inputs = $request->input('inputs');

    foreach ($inputs as $i => $input) {
        $validator = Validator::make($input, [
            'instansi' => 'required',
            'id_semester' => 'required',
            'kode_matakuliah' => 'required',
            'matakuliah' => 'required',
            'nama_kelas_pengajaran' => 'required',
            'volume_dosen_pengajar' => 'required|numeric',
            'sks_pengajaran' => 'required|numeric',
            'id_kum' => 'required',
        ]);

        $idSemester = $input['id_semester'];
        $idKum = $input['id_kum'];
        $sksPengajaran = $input['sks_pengajaran'];

        $idKum = $input['id_kum'];
        

        $totalSks = Pengajaran::where('id_semester', $idSemester)
        ->where('id_kum', $idKum )
        ->where('status', 1)
        ->sum('sks_pengajaran');




        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $pengajaran = new Pengajaran();
        $pengajaran->instansi = $input['instansi'];
        $pengajaran->id_semester = $input['id_semester'];
        $pengajaran->kode_matakuliah = $input['kode_matakuliah'];
        $pengajaran->matakuliah = $input['matakuliah'];
        $pengajaran->nama_kelas_pengajaran = $input['nama_kelas_pengajaran'];
        $pengajaran->volume_dosen_pengajar = $input['volume_dosen_pengajar'];
        $pengajaran->sks_pengajaran = $input['sks_pengajaran'];
        $pengajaran->id_kum = $input['id_kum'];
        $volumeDosen = floatval($input['volume_dosen_pengajar']);

        if ($totalSks + $sksPengajaran > 12) {
            // $validator->errors()->add('sks_pengajaran', 'Total SKS melebihi batas maksimum (12) untuk id_semester dan id_kum yang sama.');
            // continue;
            $pengajaran->status = 0;
        }elseif ($totalSks + $sksPengajaran <= 12) {
            $pengajaran->status = 1;
        }
        elseif ($volumeDosen <= 0 || $sksPengajaran <= 0) {
            $validator->errors()->add('angka', 'tidak boleh nol');
            continue;
        }

        $pengajaran->jumlah_angka_kredit = (1 / $volumeDosen) * $sksPengajaran;       
        

        // if ($image = $request->file('inputs.'.$i.'.file')) {
        //     $destinationPath = 'file/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $pengajaran->file = $profileImage;
        // }

        if ($image = $request->file('inputs.'.$i.'.file')) {
            $destinationPath = 'file/';
            $originalName = $image->getClientOriginalName();
            $profileImage = date('YmdHis') . '_' . $originalName;
            $image->move($destinationPath, $profileImage);
            $pengajaran->file = $profileImage;
        }
        
        $pengajaran->save();
        $kumId = $pengajaran->id_kum;

    }

    return redirect()->route('pengajaran.show', $kumId)->with('message', 'Data berhasil disimpan'); 
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kum = kum::find($id);
        $p = pengajaran::join('kums', 'pengajarans.id_kum', '=', 'kums.id')
        ->select('pengajarans.id_semester')
        ->where('kums.id', $kum->id)
        ->groupBy('pengajarans.id_semester')
        ->get();
        

        $pengajarangroupbysemester = [];

        foreach($p as $pgbs){
            $p = $pgbs->id_semester;

            $pengajarangroupbysemester[] = $p;
            $pp = $pengajarangroupbysemester;
        }

        $pengajaranBySemester = [];
    
        foreach ($pengajarangroupbysemester as $semester) {
            $pengajaran = pengajaran::where('id_kum', $kum->id)
                ->where('id_semester', $semester)
                ->get();
                
            $pengajaranBySemester[$semester] = $pengajaran;
        }


    
        $pelaksanaan_pendidikan = pelaksanaan_pendidikan::where('kum_id', $kum->id)->get();
        $pengajaran = pengajaran::where('id_kum', $kum->id)->get();
        $jenis_pelaksanaan_pendidikan = jenis_pelaksanan_pendidikan::all();
        $semester = semester::all();
        return view('.user.board.boardpengajaran',[
            'kum' =>$kum,
            'jenis_pelaksanaan_pendidikan' => $jenis_pelaksanaan_pendidikan,
            'pelaksanaan_pendidikan' => $pelaksanaan_pendidikan,
            'semester' => $semester,
            'pengajaran' => $pengajaran,
            'pengajaranBySemester' => $pengajaranBySemester
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengajaran $pengajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'instansi' => 'required',
            'id_semester' => 'required|integer',
            'kode_matakuliah' => 'required|max:255',
            'matakuliah' => 'required|string',
            'nama_kelas_pengajaran' => 'required',
            'volume_dosen_pengajar' => 'required',
            'sks_pengajaran' => 'required',
        ]);

        $volumeDosen = floatval($input['volume_dosen_pengajar']);
        $sks = floatval($input['sks_pengajaran']);

        $hasil = (1 / $volumeDosen) * $sks;
        $input['jumlah_angka_kredit'] = floatval($hasil);
        $pengajaran = pengajaran::findOrFail($id);

        $pengajaran->update($input);

        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengajaran = pengajaran::findOrFail($id);
        $pengajaran->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
