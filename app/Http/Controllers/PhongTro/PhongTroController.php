<?php

namespace App\Http\Controllers\PhongTro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhongTroController extends Controller
{
    //
    public function index(){
        return view('backend.phongtro.index');
    }
}
