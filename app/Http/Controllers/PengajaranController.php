<?php

namespace App\Http\Controllers;

use App\Imports\PengajaranImport;
use App\Models\jenis_pelaksanan_pendidikan;
use App\Models\kum;
use App\Models\Lampiran;
use App\Models\pelaksanaan_pendidikan;
use App\Models\pengajaran;
use App\Http\Controllers\Controller;
use App\Models\semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

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

    return redirect()->route('pengajaranuser.show', $kumId)->with('message', 'Data berhasil disimpan'); 
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $baa_id_kum = 1;
        $kum = kum::find($id);
        $nama = Auth::user()->name;
        $p = pengajaran::join('kums', 'pengajarans.id_kum', '=', 'kums.id')
        ->select('pengajarans.id_semester')
        ->where('kums.id', $kum->id)
        ->orWhere('pengajarans.id_kum', $baa_id_kum)
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
            $pengajaran = pengajaran::where(function ($query) use ($semester, $kum) {
                $query->where('id_semester', $semester)
                      ->where('id_kum', $kum->id);
            })
            // ->orWhere(function ($query) use ($semester) {
            //     $name = Auth::user()->name;
            //     $query->where('id_semester', $semester)
            //           ->where('id_kum', 1)
            //           ->where('dosen_1', $name)
            //           ->orWhere('dosen_2', $name)
            //           ->orWhere('dosen_3', $name);
            // })
            ->get();
        
            $pengajaranBySemester[$semester] = $pengajaran;
        }
        


        // pengajaran where id_kum == 1

        $pz = pengajaran::join('kums', 'pengajarans.id_kum', '=', 'kums.id')
        ->select('pengajarans.id_semester')
        ->where('kums.id', 1)
        ->groupBy('pengajarans.id_semester')
        ->get();
        

        $pengajarangroupbysemester_baa = [];

        foreach($pz as $pgbs_baa){
            $pz = $pgbs_baa->id_semester;

            $pengajarangroupbysemester_baa[] = $pz;
            $pp = $pengajarangroupbysemester_baa;
        }

        $pengajaranBySemester_baa = [];
    
        foreach ($pengajarangroupbysemester_baa as $semester) {
            $pengajaran = pengajaran::where('id_semester', $semester)
                ->where('id_kum', 1)
                ->where('dosen_1', $nama)
                ->orWhere('dosen_2', $nama)
                ->orWhere('dosen_3', $nama)
                ->get();
                
            $pengajaranBySemester_baa[$semester] = $pengajaran;
        }


    
        $pelaksanaan_pendidikan = pelaksanaan_pendidikan::where('kum_id', $kum->id)->get();
        $pengajaran = pengajaran::where('id_kum', $kum->id)->get();
        $jenis_pelaksanaan_pendidikan = jenis_pelaksanan_pendidikan::all();
        $semester = semester::all();
        $datapengajaran = pengajaran::where('dosen_1', $nama)
        ->orWhere('dosen_2', $nama)
        ->orWhere('dosen_3', $nama)
        ->get();
        $pengajaran_baa = pengajaran::where('id_kum', 1)->where('dosen_1', $nama)
        ->orWhere('dosen_2', $nama)
        ->orWhere('dosen_3', $nama)
        ->get();

        return view('.user.board.boardpengajaran',[
            'kum' =>$kum,
            'jenis_pelaksanaan_pendidikan' => $jenis_pelaksanaan_pendidikan,
            'pelaksanaan_pendidikan' => $pelaksanaan_pendidikan,
            'semester' => $semester,
            'pengajaran' => $pengajaran,
            'pengajaranBySemester' => $pengajaranBySemester,
            'pengajaranBySemester_baa' => $pengajaranBySemester_baa,
            'datapengajaran' => $datapengajaran,
            'pengajaran_baa' => $pengajaran_baa
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
    // public function update(Request $request, $id)
    // {
    //     $input = $request->validate([
    //         'instansi' => 'required',
    //         'id_semester' => 'required|integer',
    //         'kode_matakuliah' => 'required|max:255',
    //         'matakuliah' => 'required|string',
    //         'nama_kelas_pengajaran' => 'required',
    //         'volume_dosen_pengajar' => 'required',
    //         'sks_pengajaran' => 'required',
    //         'id_kum' => ''
    //     ]);

    //     $volumeDosen = floatval($input['volume_dosen_pengajar']);
    //     $sks = floatval($input['sks_pengajaran']);
    //     $idSemester = $input['id_semester'];
    //     $idKum = $input['id_kum'];

    //     $sksPengajaran = $input['sks_pengajaran'];
    //     $totalSks = Pengajaran::where('id_semester', $idSemester)
    //     ->where('id_kum', $idKum )
    //     ->where('status', 1)
    //     ->sum('sks_pengajaran');

    //     $volumeDosen = floatval($input['volume_dosen_pengajar']);
    //     $sks = floatval($input['sks_pengajaran']);

    //     $status = null ;
    //     if($totalSks + $sksPengajaran > 12){
    //             $status = 0;
    //     }elseif ($totalSks + $sksPengajaran <= 12) {
    //         if($status == "on"){
    //             $status = 1;
    //         }else{
    //             $status = 0;
    //         }    
    //     }
    //     $hasil = (1 / $volumeDosen) * $sks;
    //     $input['jumlah_angka_kredit'] = floatval($hasil);
    //     $pengajaran = pengajaran::findOrFail($id);

    //     $pengajaran->update($input);

    //     return redirect()->back()->with('message', 'Data berhasil disimpan');
    // }

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
        'id_kum' => ''
    ]);

    $volumeDosen = floatval($input['volume_dosen_pengajar']);
    $sks = floatval($input['sks_pengajaran']);
    $idSemester = $input['id_semester'];
    $idKum = $input['id_kum'];

    $sksPengajaran = $input['sks_pengajaran'];
    $totalSks = Pengajaran::where('id_semester', $idSemester)
        ->where('id_kum', $idKum)
        ->where('status', 1)
        ->sum('sks_pengajaran');

        if ($totalSks + $sksPengajaran > 12) {
            $status = 0;
        } elseif ($totalSks + $sksPengajaran <= 12) {
            if ($request->has('status') && $request->status == "on") {
                $status = 1;
            } else {
                $status = 0;
            }
        }

    $hasil = (1 / $volumeDosen) * $sks;
    
    $input['status'] = $status;
    $input['jumlah_angka_kredit'] = floatval($hasil);
    $pengajaran = Pengajaran::findOrFail($id);


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

    /**
     * BAA
     */

     public function baa_pelaksanaan_pendidikan(){
        $semester = semester::all();
        $user = User::where('role', 2)->get();
        return view('.baa.pelaksanaan_pendidikan.add',[
            'semester' => $semester,
            'user' => $user,
        ]);
     }
        public function store_baa(Request $request)
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
                    'dosen1' => 'required|numeric',
                    'dosen2' => 'required|numeric',
                    'dosen3' => 'required|numeric',
                    
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }

                $idSemester = $input['id_semester'];
                $sksPengajaran = $input['sks_pengajaran'];

                $idKum = 1;
                

                $totalSks = Pengajaran::where('id_semester', $idSemester)
                ->where('id_kum', $idKum )
                ->where('status', 1)
                ->sum('sks_pengajaran');

                if ($image = $request->file('inputs.'.$i.'.sk')) {
                    $destinationPath = 'file/';
                    $originalName = $image->getClientOriginalName();
                    $profileImage = date('YmdHis') . '_' . $originalName;
                    $image->move($destinationPath, $profileImage);
                }

                $pengajaran = new Pengajaran();
                $pengajaran->instansi = $input['instansi'];
                $pengajaran->id_semester = $input['id_semester'];
                $pengajaran->dosen1 = $input['dosen1'];
                $pengajaran->dosen2 = $input['dosen2'];
                $pengajaran->dosen3 = $input['dosen3'];
                $pengajaran->kode_matakuliah = $input['kode_matakuliah'];
                $pengajaran->matakuliah = $input['matakuliah'];
                $pengajaran->nama_kelas_pengajaran = $input['nama_kelas_pengajaran'];
                $pengajaran->volume_dosen_pengajar = $input['volume_dosen_pengajar'];
                $pengajaran->sks_pengajaran = $input['sks_pengajaran'];
                $pengajaran->id_kum = $idKum;
                $pengajaran->sk = $profileImage;
                $volumeDosen = floatval($input['volume_dosen_pengajar']);

                if ($totalSks + $sksPengajaran > 12) {
                    $pengajaran->status = 0;
                }elseif ($totalSks + $sksPengajaran <= 12) {
                    $pengajaran->status = 1;
                }
                elseif ($volumeDosen <= 0 || $sksPengajaran <= 0) {
                    $validator->errors()->add('angka', 'tidak boleh nol');
                    return back()->withErrors(['angka' => 'Tidak boleh nol'])->withInput();
                }

                $pengajaran->jumlah_angka_kredit = (1 / $volumeDosen) * $sksPengajaran;       
                


                // dd($pengajaran);
                $pengajaran->save();

                

            }

            

            return redirect()->back(); 
        }

        public function show_baa($id)
        {


            $id = 1;
            $p = pengajaran::join('kums', 'pengajarans.id_kum', '=', 'kums.id')
            ->select('pengajarans.id_semester')
            ->where('kums.id', $id)
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
                $pengajaran = pengajaran::where('id_kum', $id )
                    ->where('id_semester', $semester)
                    ->get();
                    
                $pengajaranBySemester[$semester] = $pengajaran;
            }

    
    
        
            $pelaksanaan_pendidikan = pelaksanaan_pendidikan::where('kum_id', $id)->get();
            $pengajaran = pengajaran::where('id_kum', $id)->get();
            $jenis_pelaksanaan_pendidikan = jenis_pelaksanan_pendidikan::all();
            $semester = semester::all();
            $user = User::all();

            $pengajaran_baa = pengajaran::where('id_kum', 1)->get();
            return view('.BAA.pelaksanaan_pendidikan.index',[
                'kum' =>$id,
                'jenis_pelaksanaan_pendidikan' => $jenis_pelaksanaan_pendidikan,
                'pelaksanaan_pendidikan' => $pelaksanaan_pendidikan,
                'semester' => $semester,
                'pengajaran' => $pengajaran,
                'pengajaranBySemester' => $pengajaranBySemester,
                'user' => $user,
                'pengajaran_baa' => $pengajaran_baa,
            ]);
        }


        public function import(Request $request){

            $id_semester = $request->input('id_semester');
            $id_kum = $request->input('id_kum');

            Excel::import(new PengajaranImport($id_semester,$id_kum), request()->file('data'));


            $input = $request->validate([
                'jenislampiran' => 'required'
            ]);
    
            $input['id_user'] = auth()->user()->id;
    
            if ($image = $request->file('file')) {
                $destinationPath = 'lampiran/';
                $originalName = $image->getClientOriginalName();
                $profileImage = date('YmdHis') . '_' . $originalName;
                $image->move($destinationPath, $profileImage);
                $input['file'] = "$profileImage";
            }

            Lampiran::create($input);

            return redirect()->back()->with('success', 'import data berhasil');            
        }

        public function update_pengajaran_baa(Request $request, $id)
        {
            $input = $request->validate([
                'instansi' => 'required',
                'id_semester' => 'required|integer',
                'kode_matakuliah' => 'required|max:255',
                'matakuliah' => 'required|string',
                'nama_kelas_pengajaran' => 'required',
                'volume_dosen_pengajar' => 'required',
                'sks_pengajaran' => 'required'
            ]);
        
            $volumeDosen = floatval($input['volume_dosen_pengajar']);
            $sks = floatval($input['sks_pengajaran']);
            $idSemester = $input['id_semester'];
            $idKum = $input['id_kum'];
        
            $sksPengajaran = $input['sks_pengajaran'];
            $totalSks = Pengajaran::where('id_semester', $idSemester)
                ->where('id_kum', $idKum)
                ->where('status', 1)
                ->sum('sks_pengajaran');
        
                if ($totalSks + $sksPengajaran > 12) {
                    $status = 0;
                } elseif ($totalSks + $sksPengajaran <= 12) {
                    if ($request->has('status') && $request->status == "on") {
                        $status = 1;
                    } else {
                        $status = 0;
                    }
                }
        
            $hasil = (1 / $volumeDosen) * $sks;
            
            $input['status'] = $status;
            $input['jumlah_angka_kredit'] = floatval($hasil);
            $pengajaran = Pengajaran::findOrFail($id);
        
            $pengajaran->update($input);
        
            return redirect()->back()->with('message', 'Data berhasil disimpan');
        }

        // public function clone($id){
            
        //     $pengajaran = pengajaran::findOrFail($id);
        //     $clone_data = $pengajaran->replicate();
        //     $clone_data->save();
            

        //     return redirect()->back();
        // }
        public function clone($id,Request $request){
            
            $pengajaran = pengajaran::findOrFail($id);
            $clone_data = $pengajaran->replicate();
            $clone_data->id_kum = $request->input('id_kum');
            $clone_data->save();
            return redirect()->back();
        }

        public function clone_($id){
            
            $pengajaran = pengajaran::findOrFail($id);
            $clone_data = $pengajaran->replicate();
            $clone_data->save();

            return redirect()->back();
        }

        public function store_clone(Request $request)
        {
            $input = $request->validate([
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
        
                $totalSks = Pengajaran::where('id_semester', $idSemester)
                    ->where('id_kum', $idKum)
                    ->where('status', 1)
                    ->sum('sks_pengajaran');
        
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
                    $pengajaran->status = 0;
                } elseif ($totalSks + $sksPengajaran <= 12) {
                    $pengajaran->status = 1;
                }
        
                if ($volumeDosen <= 0 || $sksPengajaran <= 0) {

                }
        
                $pengajaran->jumlah_angka_kredit = (1 / $volumeDosen) * $sksPengajaran;
                if ($image = $input['file']) {
                    $destinationPath = 'file/';
                    $originalName = $image->getClientOriginalName();
                    $profileImage = date('YmdHis') . '_' . $originalName;
                    $image->move($destinationPath, $profileImage);
                    $pengajaran->file = $profileImage;
                }
                $pengajaran->save();

                $kumId = $pengajaran->id_kum;
            return redirect()->route('pengajaranuser.show', $kumId)->with('message', 'Data berhasil disimpan');
        }
        

}


