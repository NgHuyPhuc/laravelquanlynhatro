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
    public function create(Request $request, $id_phong)
    {
        $data = [
            'id_phong_tro' => $id_phong,
            'date' => Carbon::now(),
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
}
?>