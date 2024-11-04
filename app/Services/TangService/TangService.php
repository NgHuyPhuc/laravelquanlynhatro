<?php
namespace App\Services\TangService;

use App\Repositories\Repository\TangRepository;
use Illuminate\Http\Request;

class TangService
{
    protected $tang;
    public function __construct(TangRepository $tangRepository)
    {
        $this->tang = $tangRepository;
    }
    public function getall($id)
    {
        return $this->tang->getall($id);    
    }
    public function create(Request $request,$id)
    {
        $data = [
            'id_nha_tro' => $id,
            'ten_tang' => $request->ten_tang,
            'ten_tang_so' => $request->ten_tang_so,
        ];
        return $this->tang->create($data);
    }
    public function getone($id)
    {
        return $this->tang->find($id);
    }
    public function update(Request $request, $id){
        $data = [
            'ten_tang' => $request->ten_tang,
            'ten_tang_so' => $request->ten_tang_so,
        ];
        return $this->tang->update($id, $data);
    }
    public function delete($id)
    {
        return $this->tang->delete($id);
    }
}
?>