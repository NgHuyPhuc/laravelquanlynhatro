<?php
namespace App\Services\ChiPhiDichVuService;

use App\Repositories\Repository\ChiPhiDichVuRepository;
use Illuminate\Http\Request;

class ChiPhiDichVuService
{
    protected $chiPhiDichVu;
    public function __construct(ChiPhiDichVuRepository $chiPhiDichVuRepository)
    {
        $this->chiPhiDichVu = $chiPhiDichVuRepository;
    }
    public function getall()
    {
        return $this->chiPhiDichVu->all();
    }
    public function create(Request $request)
    {
        $data = [
            'ten' => $request->name,
        ];
        return $this->chiPhiDichVu->create($data);
    }
    public function getone($id)
    {
        return $this->chiPhiDichVu->find($id);
    }
}
?>