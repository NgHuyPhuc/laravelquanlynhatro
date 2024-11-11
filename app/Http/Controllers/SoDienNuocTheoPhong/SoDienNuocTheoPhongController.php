<?php

namespace App\Http\Controllers\SoDienNuocTheoPhong;

use App\Http\Controllers\Controller;
use App\Services\PhongTroService\PhongTroService;
use App\Services\SoDienNuocTheoPhongService\SoDienNuocTheoPhongService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SoDienNuocTheoPhongController extends Controller
{
    protected $soDienNuoc;
    protected $phongTro;
    public function __construct(SoDienNuocTheoPhongService $soDienNuoc, PhongTroService $phongTro){
        $this->soDienNuoc = $soDienNuoc;
        $this->phongTro = $phongTro;
    }
    public function index($id, $id_phong){
        
    }
    public function create(Request $request, $id, $id_phong){

    }
    public function store(Request $request, $id, $id_phong){
        $this->soDienNuoc->create($request, $id_phong);
    }
    public function firstCreate($id, $id_phong){
        $data['check'] = 0;
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        // $data['month'] = Carbon::now()->month - 1;
        $data['phong'] = $this->phongTro->getone($id_phong);
        return view('backend.hoadon.sodiennuochientai',$data);
    }
    public function postFirstCreate(Request $request, $id, $id_phong){
        $data['check'] = 0;
        $this->soDienNuoc->firstCreate($request, $id_phong);
        return redirect()->route('nhatro.phong.show.info', ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function edit($id, $id_phong){
        
    }
    public function update(Request $request, $id, $id_phong){
        
    }
    public function destroy($id, $id_phong){
        
    }
}
