<?php

namespace App\Http\Controllers\HoaDonPhongTro;

use App\Http\Controllers\Controller;
use App\Services\ChiPhiDichVuService\ChiPhiDichVuService;
use App\Services\HoaDonService\HoaDonService;
use App\Services\PhongTroService\PhongTroService;
use App\Services\SoDienNuocTheoPhongService\SoDienNuocTheoPhongService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HoaDonPhongTroController extends Controller
{
    //
    protected $phongTro;
    protected $hoaDon;
    protected $soDienNuoc;
    protected $chiPhiDichVu;
    public function __construct(PhongTroService $phongTro, HoaDonService $hoaDon, SoDienNuocTheoPhongService $soDienNuoc, 
    ChiPhiDichVuService $chiPhiDichVu){
        $this->phongTro = $phongTro;
        $this->hoaDon = $hoaDon;
        $this->soDienNuoc = $soDienNuoc;
        $this->chiPhiDichVu = $chiPhiDichVu;
    }
    public function index($id, $id_phong){
        
    }
    public function create($id, $id_phong){
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $monthNow = Carbon::now()->month;
        $data['month'] = $monthNow - 1;
        $data['sdnLast'] = $this->soDienNuoc->getLastest($id_phong);
        $data['sdnSecond'] = $this->soDienNuoc->getSecondLast($id_phong);
        $data['cpdv'] = $this->chiPhiDichVu->getone($id);
        $data['sdn'] = $this->soDienNuoc->getbyphong($id_phong)->take(5)->get();
        $data['tien_dien'] = ($data['sdnLast']->so_dien - $data['sdnSecond']->so_dien) * $data['cpdv']->tien_dien_int;
        $data['tien_nuoc'] = ($data['sdnLast']->so_nuoc - $data['sdnSecond']->so_nuoc) * $data['cpdv']->tien_nuoc_int;
        $data['tien_mang'] = $data['phong']->dung_mang * $data['cpdv']->tien_mang_int;
        $data['tong_cong'] = $data['tien_dien'] + $data['tien_nuoc'] + $data['tien_mang'] + $data['phong']->gia_phong;
        // dd($data);
        return view('backend.hoadon.create',$data);
    }

    public function createMonth($id, $id_phong){
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $monthNow = Carbon::now()->month;
        $data['month'] = $monthNow - 1;
        $data['sdnLast'] = $this->soDienNuoc->getLastest($id_phong);
        $data['sdnSecond'] = $this->soDienNuoc->getSecondLast($id_phong);
        $data['cpdv'] = $this->chiPhiDichVu->getone($id);
        $data['sdn'] = $this->soDienNuoc->getbyphong($id_phong)->take(5)->get();
        $data['tien_dien'] = ($data['sdnLast']->so_dien - $data['sdnSecond']->so_dien) * $data['cpdv']->tien_dien_int;
        $data['tien_nuoc'] = ($data['sdnLast']->so_nuoc - $data['sdnSecond']->so_nuoc) * $data['cpdv']->tien_nuoc_int;
        $data['tien_mang'] = $data['phong']->dung_mang * $data['cpdv']->tien_mang_int;
        $data['tong_cong'] = $data['tien_dien'] + $data['tien_nuoc'] + $data['tien_mang'] + $data['phong']->gia_phong;
        // dd($data);
        return view('backend.hoadon.createmonth',$data);
    }
    public function getcreateMonth(Request $request, $id, $id_phong){
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $monthNow = Carbon::now()->month;
        $data['month'] = $monthNow - 1;
        $data['sdnLast'] = $this->soDienNuoc->getone($request->id_last);
        $data['sdnSecond'] = $this->soDienNuoc->getone($request->id_second);
        $data['cpdv'] = $this->chiPhiDichVu->getone($id);
        $data['sdn'] = $this->soDienNuoc->getbyphong($id_phong)->take(5)->get();
        $data['tien_dien'] = ($data['sdnLast']->so_dien - $data['sdnSecond']->so_dien) * $data['cpdv']->tien_dien_int;
        $data['tien_nuoc'] = ($data['sdnLast']->so_nuoc - $data['sdnSecond']->so_nuoc) * $data['cpdv']->tien_nuoc_int;
        $data['tien_mang'] = $data['phong']->dung_mang * $data['cpdv']->tien_mang_int;
        $data['tong_cong'] = $data['tien_dien'] + $data['tien_nuoc'] + $data['tien_mang'] + $data['phong']->gia_phong;
        // dd($data);
        return view('backend.hoadon.getcreatemonth',$data);
    }
    public function store(Request $request, $id, $id_phong){
        $soDienNuocPrev = $this->soDienNuoc->getSecondLast($id_phong);
        $soDienNuocNow = $this->soDienNuoc->getLastest($id_phong);        
        $this->hoaDon->create($request,$id_phong, $soDienNuocPrev, $soDienNuocNow);
        return redirect()->route('nhatro.show',['id' => $id]);
    }
    public function edit($id, $id_phong){
        
    }
    public function update(Request $request, $id, $id_phong){
        
    }
    public function destroy($id, $id_phong){
        
    }
}
