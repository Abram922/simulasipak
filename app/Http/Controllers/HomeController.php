<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('.user.home');
    }

    public function adminhome(){
        return view('.admin.home');
    }
    public function userhome(){
        return view('.user.home');
    }

    public function boardpak(){
        $jabatanpref = jabatan::all();
        $jabatanafter = jabatan::all();


        return view('.user.menuperhitungan', compact('jabatanpref', 'jabatanafter'));
    }
}
