<?php

namespace App\Http\Controllers\NhaTro;

use App\Http\Controllers\Controller;
use App\Models\ChiPhiDichVu;
use App\Models\NhaTro;
use App\Services\ChiPhiDichVuService\ChiPhiDichVuService;
use App\Services\NhaTroService\NhaTroService;
use App\Services\PhongTroService\PhongTroService;
use App\Services\TangService\TangService;
use Illuminate\Http\Request;

class NhaTroController extends Controller
{
    protected $nhatroService;
    protected $tangService;
    protected $phongTroService;
    protected $chiPhiDichVuService;
    public function __construct(NhaTroService $nhatroService, TangService $tangService, PhongTroService $phongTroService, ChiPhiDichVuService $chiPhiDichVuService)
    {
        $this->nhatroService = $nhatroService;
        $this->tangService = $tangService;
        $this->phongTroService = $phongTroService;
        $this->chiPhiDichVuService = $chiPhiDichVuService;
    }
    //
    public function getall()
    {
        return $this->nhatroService->getall();
    }
    public function create(){
        return view('backend.nhatro.create');
    }

    public function store(Request $request){
        $this->nhatroService->create($request);
        return redirect()->route('dashboard');
    }

    public function show($id){
        $data['thongtin'] = $this->nhatroService->getTangandPhongTro($id);
        $cpdv = $this->chiPhiDichVuService->getByNhaTroID($id);
        if($cpdv == null){
            $data['checkCpdv'] = 0;
        }
        else{
            $data['checkCpdv'] = 1;
        }
        return view('backend.nhatro.index', $data);
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
