<?php
namespace App\Services\PhongTroService;

use App\Repositories\Repository\PhongTroRepository;
use Illuminate\Http\Request;

class PhongTroService
{
    protected $phongtro;
    public function __construct(PhongTroRepository $phongtroRepository)
    {
        $this->phongtro = $phongtroRepository;
    }
    public function getall()
    {
        return $this->phongtro->all();
    }
    public function create(Request $request)
    {
        $data = [
            'ten' => $request->name,
        ];
        return $this->phongtro->create($data);
    }
    public function getone($id)
    {
        return $this->phongtro->find($id);
    }
}
?>