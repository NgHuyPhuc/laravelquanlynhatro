<?php

namespace App\Http\Controllers\HoaDonPhongTro;

use App\Http\Controllers\Controller;
use App\Services\PhongTroService\PhongTroService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HoaDonPhongTroController extends Controller
{
    //
    protected $phongTro;
    public function __construct(PhongTroService $phongTro){
        $this->phongTro = $phongTro;
    }
    public function index($id, $id_phong){
        
    }
    public function create($id, $id_phong){
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $data['month'] = Carbon::now()->month - 1;
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
