<?php
namespace App\Services\SoDienNuocTheoPhongService;

use App\Repositories\Repository\SoDienNuocTheoPhongRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SoDienNuocTheoPhongService
{
    protected $soDienNuoc;
    public function __construct(SoDienNuocTheoPhongRepository $soDienNuocRepository)
    {
        $this->soDienNuoc = $soDienNuocRepository;
    }
    public function getall()
    {
        return $this->soDienNuoc->all();
    }
    public function getbyphong($id_phong){
        return $this->soDienNuoc->getByPhong($id_phong);
    }
    public function create(Request $request, $id_phong)
    {
        $data = [
            'id_phong_tro' => $id_phong,
            'date' => $request->date,
            'so_dien' => $request->so_dien,
            'so_nuoc' => $request->so_nuoc,
            'chi_phi_phat_sinh' => $request->tong_chi_phi_dich_vu ?? 'Không có',
            'tien_phat_sinh' => $request->tong_chi_phi_dich_vu ?? 0,
        ];
        return $this->soDienNuoc->create($data);
    }
    public function getone($id)
    {
        return $this->soDienNuoc->find($id);
    }
    public function firstcreate(Request $request, $id_phong)
    {
        $data = [
            'id_phong_tro' => $id_phong,
            'date' => $request->date,
            'so_dien' => $request->so_dien,
            'so_nuoc' => $request->so_nuoc,
            'chi_phi_phat_sinh' => $request->tong_chi_phi_dich_vu ?? 'Không có',
            'tien_phat_sinh' => $request->tong_chi_phi_dich_vu ?? 0,
        ];
        return $this->soDienNuoc->create($data);
    }
    public function getLastest($id_phong)
    {
        return $this->soDienNuoc->getLastest($id_phong);
    }
    public function getSecondLast($id_phong)
    {
        return $this->soDienNuoc->getSecondLastest($id_phong);
    }
    public function count($id_phong)
    {
        return $this->soDienNuoc->countdata($id_phong);
    }
}
?>