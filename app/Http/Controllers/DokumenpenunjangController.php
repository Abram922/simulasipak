<?php

namespace App\Http\Controllers;

use App\Models\dokumenpenunjang;
use App\Http\Controllers\Controller;
use App\Models\komponendokumenpenunjang;
use App\Models\kum;
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

     
            $penunjang = new dokumenpenunjang([
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
                $originalName = $image->getClientOriginalName();
                $profileImage = date('YmdHis') . '_' . $originalName;
                $image->move($destinationPath, $profileImage);
                $penunjang->buktidp = $profileImage;
            }

            $penunjang->save();
        }
        $kumId = $input['kum_id'];
        return redirect()->route('doumenpenunjang.show', $kumId)->with('message', 'Data berhasil disimpan'); 
        

    }
    /**
     * Store a newly created resource in storage.
     */



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kum = kum::find($id);
        $dokumenpenunjang = dokumenpenunjang::where('kum_id', $kum->id)->get();
        $komponendokumenpenunjang = komponendokumenpenunjang::all();
        return view('.user.board.boardunsurpenunjang',[
            'kum' =>$kum,
            'dokumenpenunjang' => $dokumenpenunjang,
            'komponendokumenpenunjang' => $komponendokumenpenunjang,
        ]);
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

        // if ($buktiunsurpdp = $request->file('bukti')) {
        //     $destinationPath = 'bukti_unsur_utama/pelaksanaan_pm/';
        //     $originalName = $buktiunsurpdp->getClientOriginalName();
        //     $profileImage = date('YmdHis') . '_' . $originalName;
        //     $buktiunsurpdp->move($destinationPath, $profileImage);
        // }


        if ($image = $request->file('bukti')) {
            $destinationPath = 'bukti_unsur_utama/pelaksanaan_pm/';
            $originalName = $image->getClientOriginalName();
            $profileImage = date('YmdHis') . '_' . $originalName;
            $image->move($destinationPath, $profileImage);
        }

        dd($profileImage);

        $dokumenpenunjang = dokumenpenunjang::findOrFail($id);
        $dokumenpenunjang->komponenpenunjang_id = $input['komponenpenunjang_id'];
        $dokumenpenunjang->namakegiatan_dp = $input['namakegiatan_dp'];
        $dokumenpenunjang->tanggal_pelaksanaan_dp = $input['tanggal_pelaksanaan_dp'];
        $dokumenpenunjang->angkakredit_dp = $input['angkakredit_dp'];
        $dokumenpenunjang->kedudukan_dp = $input['kedudukan_dp'];
        $dokumenpenunjang->bukti = $profileImage;
        $dokumenpenunjang->save();
    
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
