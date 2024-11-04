<?php
namespace App\Services\NhaTroService;

use App\Models\NhaTro;
use App\Repositories\Repository\NhaTroRepository;
use Illuminate\Http\Request;

class NhaTroService
{
    protected $nhatro;
    public function __construct(NhaTroRepository $nhaTroRepository)
    {
        $this->nhatro = $nhaTroRepository;
    }
    public function getall()
    {
        return $this->nhatro->all();
    }
    public function create(Request $request)
    {
        $data = [
            'ten' => $request->name,
        ];
        return $this->nhatro->create($data);
    }
    public function getone($id)
    {
        return $this->nhatro->find($id);
    }
    public function getTangandPhongTro($id){
        return $this->nhatro->getTangAndPhongTro($id);
    }
}
?>