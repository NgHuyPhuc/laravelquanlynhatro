<?php
namespace App\Services\ThongTinNguoiThueService;

use App\Repositories\Repository\ThongTinNguoiThueRepository;
use Illuminate\Http\Request;

class ThongTinNguoiThueService
{
    protected $thongTinNguoiThue;
    public function __construct(ThongTinNguoiThueRepository $thongTinNguoiThue)
    {
        $this->thongTinNguoiThue = $thongTinNguoiThue;
    }
    public function getall($id)
    {
        // return $this->thongTinNguoiThue->getall($id);    
    }
    public function create(Request $request,$id)
    {
        $data = [
            'id_nha_tro' => $id,
            'ten_tang' => $request->ten_tang,
            'ten_tang_so' => $request->ten_tang_so,
        ];
        return $this->thongTinNguoiThue->create($data);
    }
    public function getone($id)
    {
        return $this->thongTinNguoiThue->find($id);
    }
    public function update(Request $request, $id){
        $data = [
            'ten_tang' => $request->ten_tang,
            'ten_tang_so' => $request->ten_tang_so,
        ];
        return $this->thongTinNguoiThue->update($id, $data);
    }
    public function delete($id)
    {
        return $this->thongTinNguoiThue->delete($id);
    }
}
?>