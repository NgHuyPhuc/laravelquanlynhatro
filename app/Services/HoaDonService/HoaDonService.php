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
    public function create(Request $request)
    {
        $data = [
            'ten' => $request->name,
        ];
        return $this->hoaDon->create($data);
    }
    public function getone($id)
    {
        return $this->hoaDon->find($id);
    }
}
?>