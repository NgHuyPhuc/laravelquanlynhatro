<?php

namespace App\Http\Controllers\SoDienNuocTheoPhong;

use App\Http\Controllers\Controller;
use App\Services\ChiPhiDichVuService\ChiPhiDichVuService;
use App\Services\NhaTroService\NhaTroService;
use App\Services\PhongTroService\PhongTroService;
use App\Services\SoDienNuocTheoPhongService\SoDienNuocTheoPhongService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SoDienNuocTheoPhongController extends Controller
{
    protected $soDienNuoc;
    protected $phongTro;
    protected $nhatroService;
    protected $chiPhiDichVuService;
    public function __construct(SoDienNuocTheoPhongService $soDienNuoc, PhongTroService $phongTro, NhaTroService $nhatroService, ChiPhiDichVuService $chiPhiDichVuService){
        $this->soDienNuoc = $soDienNuoc;
        $this->phongTro = $phongTro;
        $this->nhatroService = $nhatroService;
        $this->chiPhiDichVuService = $chiPhiDichVuService;
    }
    public function index($id, $id_phong){
        $data['diennuoc'] = $this->soDienNuoc->getbyphong($id_phong)->orderby('date','desc')->paginate(2);
        $data['phong'] = $this->phongTro->getone($id_phong);
        return view('backend.sodiennuoc.all', $data);
    }
    public function danhsachsdn($id){
        $monthNow = Carbon::now()->month;
        $data['month'] = $monthNow - 1;
        $data['thongtin'] = $this->nhatroService->getTangandPhongTro($id);
        $data['checkCpdv'] = $this->chiPhiDichVuService->getByNhaTroID($id)->count();
        return view('backend.sodiennuoc.danhsach', $data);
    }
    public function nhaptatcasdn($id) {
        $monthNow = Carbon::now()->month;
        $data['month'] = $monthNow - 1;
        $data['thongtin'] = $this->nhatroService->getTangandPhongTro($id);
        $data['checkCpdv'] = $this->chiPhiDichVuService->getByNhaTroID($id)->count();
        return view('backend.sodiennuoc.nhaptatcasdn', $data);
    }
    public function nhaptatcasdnPost(Request $request, $id) {
        // dd($request);
        $data['thongtin'] = $this->nhatroService->getTangandPhongTro($id);
        $data['checkCpdv'] = $this->chiPhiDichVuService->getByNhaTroID($id)->count();
        $this->soDienNuoc->createMultiple($request,$id);
        return redirect()->route('get.danhsachsdn', ['id' => $id]);
    }
    public function create(Request $request, $id, $id_phong){
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $monthNow = Carbon::now()->month;
        $monthSdnLast = Carbon::parse($this->soDienNuoc->getLastest($id_phong)->date)->month;
        $data['month'] = $monthNow - 1;
        $data['checksdn'] = 0;
        $data['sdnSecond'] = $this->soDienNuoc->getLastest($id_phong);
        if($monthNow == $monthSdnLast)
        {
            $data['checksdn'] = 1;
        }
        return view('backend.sodiennuoc.create',$data);
    }
    public function store(Request $request, $id, $id_phong){
        $this->soDienNuoc->create($request, $id_phong);
        return redirect()->route('danh.sach.so.dien.nuoc', ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function firstCreate($id, $id_phong){
        $data['check'] = 0;
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        return view('backend.hoadon.sodiennuochientai',$data);
    }
    public function postFirstCreate(Request $request, $id, $id_phong){
        $data['check'] = 0;
        $this->soDienNuoc->firstCreate($request, $id_phong);
        return redirect()->route('nhatro.phong.show.info', ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function edit($id, $id_phong){
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        return view('backend.sodiennuoc.edit',$data);
    }
    public function update(Request $request, $id, $id_phong){
        
    }
    public function destroy($id, $id_phong){
        
    }
}
