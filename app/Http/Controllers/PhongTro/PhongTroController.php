<?php

namespace App\Http\Controllers\PhongTro;

use App\Http\Controllers\Controller;
use App\Services\PhongTroService\PhongTroService;
use App\Services\TangService\TangService;
use Illuminate\Http\Request;

class PhongTroController extends Controller
{
    //
    protected $tangService;
    protected $phongTroService;
    public function __construct(TangService $tangService, PhongTroService $phongTroService){
        $this->tangService = $tangService;
        $this->phongTroService = $phongTroService;
    }
    public function index(){
        return view('backend.phongtro.index');
    }
    public function info($id,$id_phong){
        $data['phongtro'] = $this->phongTroService->getone($id_phong);
        $data['id'] = $id;
        return view('backend.phongtro.index',$data);
    }
    public function create($id){
        $data['tang'] = $this->tangService->getall($id);
        return view('backend.phongtro.create',['id' => $id],$data);
    }
    public function store(Request $request, $id){
        $this->phongTroService->create($request, $id);
        return redirect()->route('nhatro.show',['id' => $id]);
    }
    public function edit($id, $id_phong){
        $data['tang'] = $this->tangService->getall($id);
        $data['phongtro'] = $this->phongTroService->getone($id_phong);
        $data['id'] = $id;
        return view('backend.phongtro.edit',$data);
    }
    public function update(Request $request, $id, $id_phong){
        $this->phongTroService->update($request, $id_phong);
        return redirect()->route('nhatro.phong.show.info',['id' => $id,'id_phong' => $id_phong]);
    }
    public function destroy($id_phong){

    }
}
