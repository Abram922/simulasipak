<?php

namespace App\Http\Controllers;

use App\Models\dokumenpenunjang;
use App\Http\Controllers\Controller;
use App\Models\komponendokumenpenunjang;
use Database\Seeders\komponenpenunjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DokumenpenunjangController extends Controller
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
                'komponenpenunjang_id' => 'required',
                'kum_id'=> 'required',
                'namakegiatan_dp' => 'required',
                'tanggal_pelaksanaan_dp' => '',
                'instansi_dp' => '',
                'kedudukan_dp' =>'',
                'buktidp' => ''
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            $komponenpenunjang_id = $input['komponenpenunjang_id'];
    
            $jenisPelaksanaan = komponendokumenpenunjang::find($komponenpenunjang_id);
    
            $pelaksanaanpm = new dokumenpenunjang([
               'kum_id' => $input['kum_id'],
               'komponenpenunjang_id' => $input['komponenpenunjang_id'],
               'namakegiatan_dp' => $input['namakegiatan_dp'],
               'tanggal_pelaksanaan_dp' => $input['tanggal_pelaksanaan_dp'],
               'instansi_dp' => $input['instansi_dp'],
               'kedudukan_dp' => $input['kedudukan_dp'],                
               'angkakredit_dp' => $jenisPelaksanaan->angkakreditmax

            ]);
    
            if ($image = $request->file('inputs.'.$i.'.buktidp')) {
                $destinationPath = 'bukti_unsur_penunjang/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $pelaksanaanpm->buktidp = $profileImage;
            }
            $pelaksanaanpm->save();
        }
        
       

        return back()->with('success', 'Data berhasil disimpan');
    }
    /**
     * Store a newly created resource in storage.
     */


    // public function store(Request $request)
    // {
    //     $input = $request->validate([
            // 'komponenpenunjang_id' => 'required',
            // 'kum_id'=> 'required',
            // 'namakegiatan_dp' => 'required',
            // 'tanggal_pelaksanaan_dp' => '',
            // 'instansi_dp' => '',
            // 'angkakredit_dp' =>'',
            // 'kedudukan_dp' =>'',
            // 'buktidp' => ''
            
    //     ]);

    //     if ($image = $request->file('buktidp')) {
    //         $destinationPath = 'bukti_unsur_penunjang/';
    //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $profileImage);
    //         $input['buktidp'] = "$profileImage";
    //     }


    //     dokumenpenunjang::create($input);

    //     return redirect()->back()->with('message', 'Data berhasil disimpan');

        
    // }

    /**
     * Display the specified resource.
     */
    public function show(dokumenpenunjang $dokumenpenunjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dokumenpenunjang $dokumenpenunjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $input = $request->validate([
            'komponenpenunjang_id' => 'required',
            'namakegiatan_dp' => 'required',
            'tanggal_pelaksanaan_dp' => '',
            'instansi_dp' => '',
            'angkakredit_dp' =>'',
            'kedudukan_dp' =>'',
        ]);

        if ($buktiunsurpdp = $request->file('bukti')) {
            $destinationPath = 'bukti_unsur_utama/pelaksanaan_pm/';
            $profileImage = date('YmdHis') . "." . $buktiunsurpdp->getClientOriginalExtension();
            $buktiunsurpdp->move($destinationPath, $profileImage);
            $input['bukti'] = "$profileImage";
        }else{
            unset($input['bukti']);
        }

        $dokumenpenunjang = dokumenpenunjang::findOrFail($id);

        $dokumenpenunjang->update($input);

        return redirect()->back()->with('message', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dokumenpenunjang = dokumenpenunjang::findOrFail($id);
        $dokumenpenunjang->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
