<?php

namespace App\Http\Controllers\HoaDonPhongTro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HoaDonPhongTroController extends Controller
{
    //
    public function index($id, $id_phong){
        
    }
    public function create($id, $id_phong){
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        // $data['chi_phi_dich_vu']
        return view('backend.hoadon.create',$data);
    }
    public function store(Request $request, $id, $id_phong){
        
    }
    public function edit($id, $id_phong){
        
    }
    public function update(Request $request, $id, $id_phong){
        
    }
    public function destroy($id, $id_phong){
        
    }
}
