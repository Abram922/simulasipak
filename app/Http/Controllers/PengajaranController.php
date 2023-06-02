<?php

namespace App\Http\Controllers;

use App\Models\pengajaran;
use App\Http\Controllers\Controller;
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

    foreach ($inputs as $input) {
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
        ->where('id_kum', $idKum)
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
            $validator->errors()->add('sks_pengajaran', 'Total SKS melebihi batas maksimum (12) untuk id_semester dan id_kum yang sama.');
            continue;
        }elseif ($volumeDosen <= 0 || $sksPengajaran <= 0) {
            $validator->errors()->add('angka', 'tidak boleh nol');
            continue;
        }
        else{
            $pengajaran->jumlah_angka_kredit = (1 / $volumeDosen) * $sksPengajaran;       
        }

        $pengajaran->save();
    }

    return back()->with('success', 'Data berhasil disimpan');
}

    /**
     * Display the specified resource.
     */
    public function show(pengajaran $pengajaran)
    {
        //
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
            'id_semester' => 'required',
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
