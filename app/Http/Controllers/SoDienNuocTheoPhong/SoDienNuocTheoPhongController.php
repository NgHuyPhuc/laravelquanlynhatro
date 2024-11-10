<?php

namespace App\Http\Controllers\SoDienNuocTheoPhong;

use App\Http\Controllers\Controller;
use App\Services\SoDienNuocTheoPhongService\SoDienNuocTheoPhongService;
use Illuminate\Http\Request;

class SoDienNuocTheoPhongController extends Controller
{
    protected $soDienNuoc;
    public function __construct(SoDienNuocTheoPhongService $soDienNuoc){
        $this->soDienNuoc = $soDienNuoc;
    }
    public function index($id, $id_phong){
        
    }
    public function create(Request $request, $id, $id_phong){

    }
    public function store(Request $request, $id, $id_phong){
        // dd($request);
        $this->soDienNuoc->create($request, $id_phong);
    }
    public function edit($id, $id_phong){
        
    }
    public function update(Request $request, $id, $id_phong){
        
    }
    public function destroy($id, $id_phong){
        
    }
}
