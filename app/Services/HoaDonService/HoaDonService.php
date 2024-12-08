<?php

namespace App\Services\HoaDonService;

use App\Repositories\Repository\HoaDonRepository;
use App\Services\PhongTroService\PhongTroService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HoaDonService
{
    protected $hoaDon;
    protected $phongTroService;
    public function __construct(HoaDonRepository $hoaDonRepository, PhongTroService $phongTroService)
    {
        $this->hoaDon = $hoaDonRepository;
        $this->phongTroService = $phongTroService;
    }
    public function getall()
    {
        return $this->hoaDon->all();
    }
    public function create(Request $request, $id_phong, $soDienNuocPrev, $soDienNuocNow)
    {
        // dd($request);
        $data = [
            'id_phong_tro' => $request->id_phong_tro,
            'dung_mang' => $request->dung_mang,
            'tien_mang' => $request->tien_mang,
            'tien_dien_string' => $request->tien_dien_string,
            'tien_nuoc_string' => $request->tien_nuoc_string,
            'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh,
            'tien_phong_string' => $request->tien_phong_string,
            'thang' => $request->thang,
            'thong_bao' => $request->thong_bao,
            'tien_binh_nuoc_string' => $request->tien_binh_nuoc_string,
            'tien_binh_nuoc_int' => $request->tien_binh_nuoc_int,
            'tien_phong_int' => $request->tien_phong_int,
            'tien_dien_int' => $request->tien_dien_int,
            'tien_nuoc_int' => $request->tien_nuoc_int,
            'tien_phat_sinh' => $request->tien_phat_sinh,
            'so_tien_phai_tra' => $request->so_tien_phai_tra,
            'so_tien_da_thanh_toan' => $request->so_tien_da_thanh_toan,
            'so_du' => $request->so_du,
            'trang_thai' => $request->trang_thai,
        ];
        return $this->hoaDon->create($data);
    }
    public function getone($id)
    {
        return $this->hoaDon->find($id);
    }
    public function getByIdPhong($id_phong)
    {
        return $this->hoaDon->getByIdPhong($id_phong);
    }
    public function update(Request $request, $id, $id_phong)
    {
        if (isset($request->so_tien_da_thanh_toan)) {
            if ($request->so_tien_da_thanh_toan == $request->so_tien_phai_tra || $request->so_tien_da_thanh_toan > $request->so_tien_phai_tra) {
                $trang_thai = 2;
            } elseif ($request->so_tien_da_thanh_toan < $request->so_tien_phai_tra) {
                $trang_thai = 1;
            } else {
                $trang_thai = $request->trang_thai;
            }
            $data = [
                'id_phong_tro' => $id_phong,
                'dung_mang' => $request->dung_mang,
                'tien_mang' => $request->tien_mang,
                'tien_dien_string' => $request->tien_dien_string,
                'tien_nuoc_string' => $request->tien_nuoc_string,
                'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh,
                'tien_phong_string' => $request->tien_phong_string,
                'thang' => $request->thang,
                'thong_bao' => $request->thong_bao,
                'tien_binh_nuoc_string' => $request->tien_binh_nuoc_string,
                'tien_binh_nuoc_int' => $request->tien_binh_nuoc_int,
                'tien_phong_int' => $request->tien_phong_int,
                'tien_dien_int' => $request->tien_dien_int,
                'tien_nuoc_int' => $request->tien_nuoc_int,
                'tien_phat_sinh' => $request->tien_phat_sinh,
                'so_tien_phai_tra' => $request->so_tien_phai_tra,
                'so_tien_da_thanh_toan' => $request->so_tien_da_thanh_toan,
                'so_du' => $request->so_tien_da_thanh_toan - $request->so_tien_phai_tra,
                'trang_thai' => $trang_thai,
            ];
        }
        return $this->hoaDon->update($id, $data);
    }
    public function createAllHoaDon($id, $nhaTro, $cpdv)
    {
        foreach ($nhaTro->tangdesc as $item) {
            foreach ($item->phongtro as $phong) {
                if($phong->trang_thai == 1)
                {
                    $soDienNuocNow = $phong->getLastestSdn();
                    $soDienNuocPrev = $phong->getSecondSdn();
                    if ($soDienNuocNow && $soDienNuocPrev) {
                        $data = [
                            'id_phong_tro' => $phong->id,
                            'dung_mang' => $phong->dung_mang,
                            'tien_mang' => $this->tien_mang($phong,$cpdv),
                            'tien_dien_string' => $this->tinhTienDienString($soDienNuocPrev, $soDienNuocNow, $cpdv),
                            'tien_nuoc_string' => $this->tinhTienNuocString($soDienNuocPrev, $soDienNuocNow, $cpdv),
                            'chi_phi_phat_sinh' => $soDienNuocNow->chi_phi_phat_sinh, // Có thể cập nhật thêm nếu cần
                            'tien_phong_string' => $this->tienPhongString($soDienNuocPrev, $soDienNuocNow, $phong, $cpdv),
                            'thang' => $this->thangString($soDienNuocNow),
                            'thong_bao' => $this->thongBaoString($soDienNuocPrev, $soDienNuocNow),
                            'tien_binh_nuoc_string' => $this->tienBinhNuocString($phong,$cpdv),
                            'tien_binh_nuoc_int' => $this->tienBinhNuocInt($phong,$cpdv),
                            'tien_phong_int' => (int) $phong->gia_phong,
                            'tien_dien_int' => $this->tinhTienDienInt($soDienNuocPrev, $soDienNuocNow, $cpdv),
                            'tien_nuoc_int' => $this->tinhTienNuocInt($soDienNuocPrev, $soDienNuocNow, $cpdv),
                            'tien_phat_sinh' => $soDienNuocNow->tien_phat_sinh,
                            'so_tien_phai_tra' => $this->tinhTongTien($soDienNuocPrev, $soDienNuocNow, $phong, $cpdv),
                            'so_tien_da_thanh_toan' => 0,
                            'so_du' => 0,
                            'trang_thai' => 0,
                        ];
                        // Tạo hóa đơn
                        $this->hoaDon->create($data);
                        $this->phongTroService->resetMuaNuoc($phong->id);
                    }
                }
            }
        }
    }
    public function tien_mang($phong, $cpdv){
        $tien_mang = 0;
        if($phong->dung_mang == 1)
        {
            $tien_mang = $cpdv->tien_mang_int;
            return $tien_mang;
        }
        return $tien_mang;
    }
    public function tienBinhNuocString($phong, $cpdv)
    {
        $tien_binh_nuoc_string = ''. $phong->mua_nuoc . ' x ' . $cpdv->tien_binh_nuoc;
        return $tien_binh_nuoc_string;
    }
    public function tienBinhNuocInt($phong, $cpdv)
    {
        $tien_binh_nuoc_string = $phong->mua_nuoc * $cpdv->tien_binh_nuoc;
        return $tien_binh_nuoc_string;
    }
    public function tienPhongString($soDienNuocNow, $phong)
    {
        $tienPhong = '' . $phong->ten_phong . ' Tháng ' . Carbon::parse($soDienNuocNow->date)->format('m') . ' năm ' . Carbon::parse($soDienNuocNow->date)->format('Y');
        return $tienPhong;
    }
    public function thangString($soDienNuocNow)
    {
        $thangString =  'Tháng ' . Carbon::parse($soDienNuocNow->date)->format('m') . ' năm ' . Carbon::parse($soDienNuocNow->date)->format('Y');
        return $thangString;
    }
    public function thongBaoString($soDienNuocPrev, $soDienNuocNow)
    {
        $thongBao = 'Xin thông báo tới anh (chị): Phí dịch vụ trong tháng ' . Carbon::parse($soDienNuocPrev->date)->format('m/Y') . ' và tiền thuê phòng tháng ' . Carbon::parse($soDienNuocNow->date)->format('m/Y') . '. Cụ thể như sau:';
        return $thongBao;
    }
    function tinhTienDienString($soDienNuocPrev, $soDienNuocNow, $cpdv)
    {
        $soDienString = '( ' . $soDienNuocNow->so_dien . ' - ' . $soDienNuocPrev->so_dien . ' ) = ' . number_format($soDienNuocNow->so_dien - $soDienNuocPrev->so_dien) . ' kWh x ' . number_format($cpdv->tien_dien_int) . ' VNĐ/kWh';
        return $soDienString;
    }
    function tinhTienNuocString($soDienNuocPrev, $soDienNuocNow, $cpdv)
    {
        $soNuocString = '( ' . $soDienNuocNow->so_nuoc . ' - ' . $soDienNuocPrev->so_nuoc . ' ) = ' . number_format($soDienNuocNow->so_nuoc - $soDienNuocPrev->so_nuoc) . ' m³ x ' . number_format($cpdv->tien_nuoc_int) . ' VNĐ/m³';
        return $soNuocString;
    }
    function tinhTienDienInt($soDienNuocPrev, $soDienNuocNow, $cpdv)
    {
        $soDien = $soDienNuocNow->so_dien - $soDienNuocPrev->so_dien;
        $tienDien = $soDien * $cpdv->tien_dien_int;
        return $tienDien;
    }
    function tinhTienNuocInt($soDienNuocPrev, $soDienNuocNow, $cpdv)
    {
        $soNuoc = $soDienNuocNow->so_nuoc - $soDienNuocPrev->so_nuoc;
        $tienNuoc = $soNuoc * $cpdv->tien_nuoc_int;
        return $tienNuoc;
    }
    function tinhTongTien($soDienNuocPrev, $soDienNuocNow, $phong, $cpdv)
    {
        $tienPhong = $phong->gia_phong;
        $muaNuoc = $phong->mua_nuoc * $cpdv->tien_binh_nuoc;
        $tien_mang = $phong->dung_mang * $cpdv->tien_mang_int;
        $tongTien = $this->tinhTienDienInt($soDienNuocPrev, $soDienNuocNow, $cpdv) + $this->tinhTienNuocInt($soDienNuocPrev, $soDienNuocNow, $cpdv)  + $tienPhong + $muaNuoc + $tien_mang;
        return $tongTien;
    }

    function getallnow()
    {
        return $this->hoaDon->getallnow();
    }
}
