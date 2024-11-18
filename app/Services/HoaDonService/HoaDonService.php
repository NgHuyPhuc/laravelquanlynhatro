<?php
namespace App\Services\HoaDonService;

use App\Repositories\Repository\HoaDonRepository;
use Illuminate\Http\Request;

class HoaDonService
{
    protected $hoaDon;
    public function __construct(HoaDonRepository $hoaDonRepository)
    {
        $this->hoaDon = $hoaDonRepository;
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
            'tien_dien_string' => $request->tien_dien_string,
            'tien_nuoc_string' => $request->tien_nuoc_string,
            'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh,
            'tien_phong_string' => $request->tien_phong_string,
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
        if(isset($request->so_tien_da_thanh_toan))
        {
            if($request->so_tien_da_thanh_toan == $request->so_tien_phai_tra || $request->so_tien_da_thanh_toan > $request->so_tien_phai_tra)
            {
                $trang_thai = 2;
                $data = [
                    'id_phong_tro' => $id_phong,
                    'dung_mang' => $request->dung_mang,
                    'tien_dien_string' => $request->tien_dien_string,
                    'tien_nuoc_string' => $request->tien_nuoc_string,
                    'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh,
                    'tien_phong_string' => $request->tien_phong_string,
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
            elseif($request->so_tien_da_thanh_toan < $request->so_tien_phai_tra){
                $trang_thai = 1;
                $data = [
                    'id_phong_tro' => $id_phong,
                    'dung_mang' => $request->dung_mang,
                    'tien_dien_string' => $request->tien_dien_string,
                    'tien_nuoc_string' => $request->tien_nuoc_string,
                    'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh,
                    'tien_phong_string' => $request->tien_phong_string,
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
            else{
                $data = [
                    'id_phong_tro' => $id_phong,
                    'dung_mang' => $request->dung_mang,
                    'tien_dien_string' => $request->tien_dien_string,
                    'tien_nuoc_string' => $request->tien_nuoc_string,
                    'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh,
                    'tien_phong_string' => $request->tien_phong_string,
                    'tien_phong_int' => $request->tien_phong_int,
                    'tien_dien_int' => $request->tien_dien_int,
                    'tien_nuoc_int' => $request->tien_nuoc_int,
                    'tien_phat_sinh' => $request->tien_phat_sinh,
                    'so_tien_phai_tra' => $request->so_tien_phai_tra,
                    'so_tien_da_thanh_toan' => $request->so_tien_da_thanh_toan,
                    'so_du' => $request->so_tien_phai_tra - $request->so_tien_da_thanh_toan,
                    'trang_thai' => $request->trang_thai,
                ];
            }
        }
        return $this->hoaDon->update($id, $data);
    }
}
?>