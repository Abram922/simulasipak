<?php

namespace App\Http\Controllers;

use App\Models\kum;
use App\Models\pelaksanaan_pm;
use App\Http\Controllers\Controller;
use App\Models\komponenpm;
use App\Models\semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelaksanaanPmController extends Controller
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
                'kum_id' => 'required',
                'komponenpm_id' => 'required',
                'nama' => 'required',
                'bentuk' => 'required|max:255',
                'tempat_instansi' => 'required|string',
                'semester_id' => 'required',
                'buktifisik' => 'file'
             ]);
     
             if ($validator->fails()) {
                 return back()->withErrors($validator)->withInput();
             }
     
             $komponenpm_id = $input['komponenpm_id'];
     
             $jenisPelaksanaan = komponenpm::find($komponenpm_id);
     
             $pelaksanaanpm = new pelaksanaan_pm([
                'kum_id' => $input['kum_id'],
                'komponenpm_id' => $input['komponenpm_id'],
                'bentuk' => $input['bentuk'],
                'nama' => $input['nama'],
                'tempat_instansi' => $input['tempat_instansi'],
                'semester_id' => $input['semester_id'],                
                'angkakreditpm' => $jenisPelaksanaan->angkakredit

             ]);
     
             if ($image = $request->file('inputs.'.$i.'.buktifisik')) {
                 $destinationPath = 'bukti_unsur_utama/pelaksanaan_pm/';
                 $originalName = $image->getClientOriginalName();
                 $profileImage = date('YmdHis') . '_' . $originalName;
                 $image->move($destinationPath, $profileImage);
                 $pelaksanaanpm->buktifisik = $profileImage;
             }
             $pelaksanaanpm->save();

         }

         $kumId = $input['kum_id'];
         return redirect()->route('pelaksanaan_pm.show', $kumId)->with('message', 'Data berhasil disimpan'); 
         
        
 
     }


    public function show($id)
    {
        $kum = kum::find($id);
        $pelaksanaan_pm = pelaksanaan_pm::where('kum_id', $kum->id)->get();
        $komponenpm = komponenpm::all();
        $semester = semester::all();

        return view('.user.board.boardpm',[
            'kum' =>$kum,
            'pelaksanaan_pm' => $pelaksanaan_pm,
            'komponenpm' => $komponenpm,
            'semester' => $semester
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelaksanaan_pm $pelaksanaan_pm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $input = $request->validate([
    //         'komponenpm_id' => 'required',
    //         'nama' => 'required',
    //         'bentuk' => 'required|max:255',
    //         'tempat_instansi' => 'required|string',
    //         'semester_id' => 'required',
    //     ]);

    //     $komponenpm_id = $input['komponenpm_id'];
    
    //     $komponen = komponenpm::find($komponenpm_id);

    //     $input['angkakreditpm'] = $komponen->angkakredit;


    //     if ($image = $request->file('buktifisik')) {
    //         $destinationPath = 'bukti_unsur_penunjang/';
    //         $originalName = $image->getClientOriginalName();
    //         $profileImage = date('YmdHis') . '_' . $originalName;
    //         $image->move($destinationPath, $profileImage);
    //     }

    //     $pm = pelaksanaan_pm::findOrFail($id);
    //     $pm->komponenpm_id = $input['komponenpm_id'];
    //     $pm->nama = $input['nama'];
    //     $pm->bentuk = $input['bentuk'];
    //     $pm->tempat_instansi = $input['tempat_instansi'];
    //     $pm->semester_id = $input['semester_id'];
    //     $pm->angkakreditpm = $input['angkakreditpm'];
    //     $pm->buktifisik = $profileImage;

    //     dd($pm);

    //     $pm->save();

    //     return redirect()->back()->with('message', 'Data berhasil disimpan');
    // }


    public function update(Request $request, $id)
{
    $input = $request->validate([
        'komponenpm_id' => 'required',
        'nama' => 'required',
        'bentuk' => 'required|max:255',
        'tempat_instansi' => 'required|string',
        'semester_id' => 'required',
    ]);

    $komponenpm_id = $input['komponenpm_id'];

    $komponen = komponenpm::find($komponenpm_id);

    $input['angkakreditpm'] = $komponen->angkakredit;

    $pm = pelaksanaan_pm::findOrFail($id);

    if ($image = $request->file('buktifisik')) {
        $destinationPath = 'bukti_unsur_utama/pelaksanaan_pm/';
        $originalName = $image->getClientOriginalName();
        $profileImage = date('YmdHis') . '_' . $originalName;
        $image->move($destinationPath, $profileImage);
        $pm->buktifisik = $profileImage;
    }

    
    $pm->komponenpm_id = $input['komponenpm_id'];
    $pm->nama = $input['nama'];
    $pm->bentuk = $input['bentuk'];
    $pm->tempat_instansi = $input['tempat_instansi'];
    $pm->semester_id = $input['semester_id'];
    $pm->angkakreditpm = $input['angkakreditpm'];
   


    dd($pm);
    $pm->save();

    return redirect()->back()->with('message', 'Data berhasil disimpan');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelaksanaan_pm = pelaksanaan_pm::findOrFail($id);
        $pelaksanaan_pm->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
    
}
