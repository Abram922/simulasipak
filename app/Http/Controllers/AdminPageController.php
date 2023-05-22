<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function pendidikan(){
        return view('.admin.komponen.pendidikan');
    }
}
