<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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
        //return $user;
        return view('.user.ubahprofil', compact('user'));
    }

    /**
     * Update the specified resource in storage.
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
