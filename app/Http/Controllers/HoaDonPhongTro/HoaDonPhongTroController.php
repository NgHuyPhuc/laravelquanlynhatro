<?php

namespace App\Http\Controllers\HoaDonPhongTro;

use App\Http\Controllers\Controller;
use App\Models\HoaDonPhongTro;
use App\Services\ChiPhiDichVuService\ChiPhiDichVuService;
use App\Services\HoaDonService\HoaDonService;
use App\Services\NhaTroService\NhaTroService;
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
    protected $nhaTro;
    public function __construct(
        PhongTroService $phongTro,
        HoaDonService $hoaDon,
        SoDienNuocTheoPhongService $soDienNuoc,
        ChiPhiDichVuService $chiPhiDichVu,
        NhaTroService $nhaTro
    ) {
        $this->phongTro = $phongTro;
        $this->hoaDon = $hoaDon;
        $this->soDienNuoc = $soDienNuoc;
        $this->chiPhiDichVu = $chiPhiDichVu;
        $this->nhaTro = $nhaTro;
    }
    public function index($id, $id_phong)
    {
        $data['hoadon'] = $this->hoaDon->getByIdPhong($id_phong)->orderByDesc('id')->paginate(5);
        $data['id_phong'] = $id_phong;
        return view('backend.hoadon.index', $data);
    }
    public function create($id, $id_phong)
    {
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $monthNow = Carbon::now();
        $data['month'] = $monthNow->subMonth(1);
        $data['sdnLast'] = $this->soDienNuoc->getLastest($id_phong);
        $data['sdnSecond'] = $this->soDienNuoc->getSecondLast($id_phong);
        $data['cpdv'] = $this->chiPhiDichVu->getByNhaTroID($id);
        $data['sdn'] = $this->soDienNuoc->getbyphong($id_phong)->take(5)->get();
        $data['tien_dien'] = ($data['sdnLast']->so_dien - $data['sdnSecond']->so_dien) * $data['cpdv']->tien_dien_int;
        $data['tien_nuoc'] = ($data['sdnLast']->so_nuoc - $data['sdnSecond']->so_nuoc) * $data['cpdv']->tien_nuoc_int;
        $data['tien_mang'] = $data['phong']->dung_mang * $data['cpdv']->tien_mang_int;
        $data['tong_tien_binh_nuoc'] = $data['phong']->mua_nuoc * $data['cpdv']->tien_binh_nuoc;
        $data['tong_cong'] = $data['tien_dien'] + $data['tien_nuoc'] + $data['tien_mang'] + $data['phong']->gia_phong + $data['tong_tien_binh_nuoc'] + $data['sdnLast']->tien_phat_sinh;
        return view('backend.hoadon.create', $data);
    }

    public function createMonth($id, $id_phong)
    {
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $monthNow = Carbon::now();
        $data['month'] = $monthNow->subMonth(1);
        $data['sdnLast'] = $this->soDienNuoc->getLastest($id_phong);
        $data['sdnSecond'] = $this->soDienNuoc->getSecondLast($id_phong);
        $data['cpdv'] = $this->chiPhiDichVu->getByNhaTroID($id);
        $data['sdn'] = $this->soDienNuoc->getbyphong($id_phong)->take(5)->get();
        $data['tien_dien'] = ($data['sdnLast']->so_dien - $data['sdnSecond']->so_dien) * $data['cpdv']->tien_dien_int;
        $data['tien_nuoc'] = ($data['sdnLast']->so_nuoc - $data['sdnSecond']->so_nuoc) * $data['cpdv']->tien_nuoc_int;
        $data['tien_mang'] = $data['phong']->dung_mang * $data['cpdv']->tien_mang_int;
        $data['tong_cong'] = $data['tien_dien'] + $data['tien_nuoc'] + $data['tien_mang'] + $data['phong']->gia_phong;
        return view('backend.hoadon.createmonth', $data);
    }
    public function getcreateMonth(Request $request, $id, $id_phong)
    {
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $monthNow = Carbon::now();
        $data['month'] = $monthNow->subMonth(1);
        $data['sdnLast'] = $this->soDienNuoc->getone($request->id_last);
        $data['sdnSecond'] = $this->soDienNuoc->getone($request->id_second);
        $data['cpdv'] = $this->chiPhiDichVu->getByNhaTroID($id);
        $data['sdn'] = $this->soDienNuoc->getbyphong($id_phong)->take(5)->get();
        $data['tien_dien'] = ($data['sdnLast']->so_dien - $data['sdnSecond']->so_dien) * $data['cpdv']->tien_dien_int;
        $data['tien_nuoc'] = ($data['sdnLast']->so_nuoc - $data['sdnSecond']->so_nuoc) * $data['cpdv']->tien_nuoc_int;
        $data['tien_mang'] = $data['phong']->dung_mang * $data['cpdv']->tien_mang_int;
        $data['tong_tien_binh_nuoc'] = $data['phong']->mua_nuoc * $data['cpdv']->tien_binh_nuoc;
        $data['tong_cong'] = $data['tien_dien'] + $data['tien_nuoc'] + $data['tien_mang'] + $data['phong']->gia_phong + $data['tong_tien_binh_nuoc'] + $data['sdnLast']->tien_phat_sinh;
        return view('backend.hoadon.getcreatemonth', $data);
    }
    public function store(Request $request, $id, $id_phong)
    {
        $soDienNuocPrev = $this->soDienNuoc->getSecondLast($id_phong);
        $soDienNuocNow = $this->soDienNuoc->getLastest($id_phong);
        $create = $this->hoaDon->create($request, $id_phong, $soDienNuocPrev, $soDienNuocNow);
        $id_hoadon = $create->id;
        $this->phongTro->resetMuaNuoc($id_phong);
        return redirect()->route('phongtro.hoadon.detailhoadon', ['id' => $id, 'id_phong' => $id_phong, 'id_hoadon' => $id_hoadon]);
    }
    public function showHoaDonPhong($id, $id_phong, $id_hoadon)
    {
        $data['hoadon'] = $this->hoaDon->getone($id_hoadon);
        // dd($data['hoadon']);

        $data['phong'] = $this->phongTro->getone($id_phong);
        // dd($data['phong']);

        $data['cpdv'] = $this->chiPhiDichVu->getByNhaTroID($id);
        // dd($data['cpdv']);

        // dd($data);
        // dd($data['phong']);
        // dd($data['cpdv']);
        return view('backend.hoadon.detail', $data);
    }
    public function edit($id, $id_phong, $id_hoadon)
    {
        $data['hoadon'] = $this->hoaDon->getone($id_hoadon);
        $data['phong'] = $this->phongTro->getone($id_phong);
        // $data['cpdv'] = $this->chiPhiDichVu->getone($id);
        $data['cpdv'] = $this->chiPhiDichVu->getByNhaTroID($id);
        return view('backend.hoadon.edit', $data);
    }
    public function update(Request $request, $id, $id_phong, $id_hoadon)
    {
        // dd($request);
        $this->hoaDon->update($request, $id_hoadon, $id_phong);
        return redirect()->route('phongtro.hoadon.detailhoadon', ['id' => $id, 'id_phong' => $id_phong, 'id_hoadon' => $id_hoadon]);
    }
    public function getTatCaHoaDon($id)
    {    
        $nhaTro = $this->nhaTro->getone($id);
        $cpdv = $this->chiPhiDichVu->getByNhaTroID($id);
        $this->hoaDon->createAllHoaDon($id, $nhaTro, $cpdv);
        return redirect()->route('phong.hoadon.danhsach.all',['id' => $id]);
    }
    public function listall($id) {
        $data['thongtin'] = $this->nhaTro->getTangandPhongTro($id);
        $cpdv = $this->chiPhiDichVu->getByNhaTroID($id);
        if($cpdv == null){
            $data['checkCpdv'] = 0;
        }
        else{
            $data['checkCpdv'] = 1;
        }
        $data['hoadon'] = $this->hoaDon->getallnow($id)->paginate(12);
        return view('backend.hoadon.listall', $data);
    }
    public function chitietlistall($id) {
        $data['thongtin'] = $this->nhaTro->getTangandPhongTro($id);
        $cpdv = $this->chiPhiDichVu->getByNhaTroID($id);
        if($cpdv == null){
            $data['checkCpdv'] = 0;
        }
        else{
            $data['checkCpdv'] = 1;
        }
        $data['cpdv'] = $this->chiPhiDichVu->getByNhaTroID($id);
        // getByNhaTroID
        $data['hoadon'] = $this->hoaDon->getallnow($id)->paginate(12);
        $data['total'] = $data['hoadon']->sum('so_tien_phai_trả');
        $data['tien_dien'] = $data['hoadon']->sum('tien_dien_int');
        $data['tien_nuoc'] = $data['hoadon']->sum('tien_nuoc_int');
        return view('backend.hoadon.detailListAll', $data);
    }
    public function destroy($id, $id_phong) {}
}
