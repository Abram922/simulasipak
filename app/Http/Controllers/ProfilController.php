<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\jabatan;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$user = User::all();
        $user = User::where('id', Auth::user()->id)->get();
        //return $user;
        //$user = User::where('id', Auth::user()->id)->get();
        return view('.user.profil',['user' => $user]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        $jabatan = jabatan::all();
        //return $user;
        return view('.user.ubahprofil', compact('user', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * 
     */

     /*
         {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'NIDN' => 'required',
            'ikatan_kerja' => 'required',
            'jabatan_fungsional' => 'required',
            'institusi' => 'required',
            'fakultas' => 'required',
            'pangkat' => 'required',
            'password' => 'required',

    
        ]);
                $user->name = $request->name;
                $user->jabatan_fungsional = $request->jabatan_fungsional;
                $user->tanggal_lahir = $request->tanggal_lahir;
                $user->tempat_lahir = $request->tempat_lahir;
                $user->NIDN = $request->NIDN;
                $user->ikatan_kerja = $request->ikatan_kerja;
                $user->fakultas = $request->fakultas;
                $user->institusi = $request->institusi;
                $user->pangkat = $request->pangkat;
                $user->foto = $nama_file;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

        $user->save();
    


        // if($request->hasFile('foto')) {

        //     $file_path = public_path() . 'profill/' . $user->foto;
    
        //     if(file_exists($file_path)) {
        //         unlink($file_path);
        //     }
    
        //     $file = $request->file('foto');
    
        //     $nama_file = time()."_".$file->getClientOriginalName();
    
        //     $file->move('profill', $nama_file);
        // }



        if($updated) {
            return redirect()->route('profil')->with('sukses', 'Data berhasil diubah');
        }

        return back()->with('sukses', 'Data gagal diubah');
    }


     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'NIDN' => 'required',
            'ikatan_kerja' => 'required',
            'jabatan_fungsional' => 'required',
            'institusi' => 'required',
            'fakultas' => 'required',
            'pangkat' => 'required'
    
        ]);
        $user = User::find($id);

        if (!$user) {
            return back()->with('gagal', 'Data tidak ditemukan');
        }

        if($request->hasFile('foto')) {

            $file_path = public_path() . 'profill/' . $user->foto;
    
            if(file_exists($file_path)) {
                unlink($file_path);
            }
    
            $file = $request->file('foto');
    
            $nama_file = time()."_".$file->getClientOriginalName();
    
            $file->move('profill', $nama_file);
    
            $user->update([
                'name' => $request->name,
                'jabatan_fungsional' => $request->jabatan_fungsional,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'NIDN' => $request->NIDN,
                'ikatan_kerja' => $request->ikatan_kerja,
                'fakultas' => $request->fakultas,
                'institusi' => $request->institusi,
                'pangkat' => $request->pangkat,
                'foto' => $nama_file
            ]);
    
            return redirect()->route('profil')->with('sukses', 'Data berhasil diubah');
        }

        $updated = $user->update([
            'name' => $request->name,
            'jabatan_fungsional' => $request->jabatan_fungsional,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'NIDN' => $request->NIDN,
            "password" => $request->password,
            'ikatan_kerja' => $request->ikatan_kerja,
            'fakultas' => $request->fakultas,
            'institusi' => $request->institusi,
            'pangkat' => $request->pangkat
        ]);
        

        if($updated) {
            return redirect()->route('profil')->with('sukses', 'Data berhasil diubah');
        }

        return back()->with('sukses', 'Data gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
