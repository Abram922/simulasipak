<?php

namespace App\Http\Controllers;

use App\Models\jenis_pelaksanan_pendidikan;
use App\Models\kum;
use App\Models\pelaksanaan_pendidikan;
use App\Http\Controllers\Controller;
use App\Models\semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelaksanaanPendidikanController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input('inputs');
    
        foreach ($inputs as $input) {
            $validator = Validator::make($input, [
                'tempat_instansi' => 'required',
                'semester_id' => 'required',
                'idjenispelaksanaan' => 'required',
                'nama_kegiatan' => 'required',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            $idJenisPelaksanaan = $input['idjenispelaksanaan'];

            $jenisPelaksanaan = jenis_pelaksanan_pendidikan::find($idJenisPelaksanaan);
    
            $pelaksanaanPendidikan = new pelaksanaan_pendidikan([
                'kum_id' => $input['id_kum'],
                'idjenispelaksanaan' => $input['idjenispelaksanaan'],
                'semester_id' => $input['semester_id'],
                'nama_kegiatan' => $input['nama_kegiatan'],
                'tempat_instansi' => $input['tempat_instansi'],
                'jumlah_angka_kredit' => $jenisPelaksanaan->angka_kredit,
            ]);
    
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
        $pelaksanaan_pendidikan = pelaksanaan_pendidikan::where('kum_id', $kum->id)->get();
        $jenis_pelaksanaan_pendidikan = jenis_pelaksanan_pendidikan::all();
        $semester = semester::all();
        return view('.user.board.boardpengajaran',[
            'kum' =>$kum,
            'jenis_pelaksanaan_pendidikan' => $jenis_pelaksanaan_pendidikan,
            'pelaksanaan_pendidikan' => $pelaksanaan_pendidikan,
            'semester' => $semester,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelaksanaan_pendidikan $pelaksanaan_pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'idjenispelaksanaan' => 'required',
            'semester_id' => 'required',
            'nama_kegiatan' => 'required|max:255',
            'tempat_instansi' => 'required|string',
            'sks' => '',
            'jumlah_kelas' => '', 
            'jumlah_angka_kredit' => '',
            'volume_dosen'=> '',
        ]);
        if ($image = $request->file('bukti')) {
            $destinationPath = 'bukti_unsur_utama/pendidikan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['bukti'] = "$profileImage";
        }else{
            unset($input['bukti']);
        }

        $pelaksanaan_pendidikan = pelaksanaan_pendidikan::findOrFail($id);

        $pelaksanaan_pendidikan->update($input);

        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        pelaksanaan_pendidikan::destroy($id);

        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }
}
