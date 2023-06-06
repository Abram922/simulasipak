<?php

namespace App\Http\Controllers;
use App\Models\pangkat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $pangkat = pangkat::all();
        //return $user;
        return view('.user.ubahprofil', compact('user', 'jabatan','pangkat'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => '',
            'tanggal_lahir' => '',
            'tempat_lahir' => '',
            'NIDN' => '',
            'ikatan_kerja' => '',
            'jabatan_fungsional' => '',
            'institusi' => '',
            'fakultas' => '',
            'pangkat' => ''
        ]);

        $user = User::find($id);
        $user->name = $input['name'] ?? $user->name; // Menggunakan null coalescing operator untuk mengatasi ketika 'name' tidak ada dalam $input array
        $user->tanggal_lahir = $input['tanggal_lahir'] ?? $user->tanggal_lahir;
        $user->tempat_lahir = $input['tempat_lahir'] ?? $user->tempat_lahir;
        $user->NIDN = $input['NIDN'] ?? $user->NIDN;
        $user->ikatan_kerja = $input['ikatan_kerja'] ?? $user->ikatan_kerja;
        $user->jabatan_fungsional = $input['jabatan_fungsional'] ?? $user->jabatan_fungsional;
        $user->institusi = $input['institusi'] ?? $user->institusi;
        $user->fakultas = $input['fakultas'] ?? $user->fakultas;
        $user->pangkat = $input['pangkat'] ?? $user->pangkat;
    
        if ($foto = $request->file('foto')) {
            $destinationPath = 'profill/';
            $profileImage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $user->foto = $profileImage;
        }
        $user->save();
        return redirect()->route('profil');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
