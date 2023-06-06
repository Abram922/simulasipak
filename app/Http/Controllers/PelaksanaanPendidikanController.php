<?php

namespace App\Http\Controllers;

use App\Models\jenis_pelaksanan_pendidikan;
use App\Models\kum;
use App\Models\pelaksanaan_pendidikan;
use App\Http\Controllers\Controller;
use App\Models\pengajaran;
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
        
    
        foreach ($inputs as $i => $input) {
            $validator = Validator::make($input, [
                'tempat_instansi' => 'required',
                'semester_id' => 'required',
                'idjenispelaksanaan' => 'required',
                'nama_kegiatan' => 'required',
                'bukti_pendidikan' => 'file' 
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
                'jumlah_angka_kredit' => $jenisPelaksanaan->angka_kredit
            ]);
    
            if ($image = $request->file('inputs.'.$i.'.bukti_pendidikan')) {
                $destinationPath = 'pelaksanaanpendidikan/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $pelaksanaanPendidikan->bukti_pendidikan = $profileImage;
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

        // dd($pengajaranBySemester);
        // dd($pengajaran);


    
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
            'tempat_instansi' => '',
            'semester_id' => 'integer',
            'idjenispelaksanaan' => 'integer',
            'nama_kegiatan' => '',
        ]);

        $idjenispelaksanaan = $input['idjenispelaksanaan'];
    
        $angka_kredit = jenis_pelaksanan_pendidikan::find($idjenispelaksanaan);

        $input['jumlah_angka_kredit'] =  $angka_kredit->angka_kredit;


         if ($request->hasFile('bukti_pendidikan')) {
            $buktiunsurpdp = $request->file('bukti_pendidikan');
            $destinationPath = 'bukti_unsur_utama/pendidikan/';
            $profileImage = date('YmdHis') . "." . $buktiunsurpdp->getClientOriginalExtension();
            $buktiunsurpdp->move($destinationPath, $profileImage);
            $input['bukti_pendidikan'] = $profileImage;
        } else {
            unset($input['bukti_pendidikan']);
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
