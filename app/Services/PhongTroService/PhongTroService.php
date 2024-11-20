<?php
namespace App\Services\PhongTroService;

use App\Repositories\Repository\PhongTroRepository;
use App\Repositories\Repository\ThongTinNguoiThueRepository;
use Illuminate\Http\Request;

class PhongTroService
{
    protected $phongtro;
    public function __construct(PhongTroRepository $phongtroRepository)
    {
        $this->phongtro = $phongtroRepository;
    }
    public function getall($id)
    {
        // return $this->phongtro->getall($id);
    }
    public function create(Request $request)
    {
        if($request->file('anh_hop_dong'))
        {
            $anh_hop_dong = $request->file('anh_hop_dong')->getClientOriginalName();
            $request->file('anh_hop_dong')->move(public_path('uploads'), $anh_hop_dong);
            // $data['anh_hop_dong'] = $anh_hop_dong;
        }
        else{
            $anh_hop_dong = 'default.png';
        }
        $data = [
            'ten_phong' => $request->ten_phong,
            'id_tang' => $request->id_tang,
            'gia_phong' => $request->gia_phong,
            'tien_coc' => $request->tien_coc ?? 0,
            'mua_nuoc' => $request->mua_nuoc ?? 0,
            'dung_mang' => 0,
            'anh_hop_dong' => $anh_hop_dong,
            'so_du' => 0,
            'mo_ta' => 'Không có',
            'trang_thai' => 0,
        ];
        return $this->phongtro->create($data);
    }
    public function update(Request $request, $id_phong)
    {
        // dd($request);
        if($request->has('trang_thai') == 0)
        {
            $data = [
                'ten_phong' => $request->ten_phong,
                'id_tang' => $request->id_tang,
                'gia_phong' => $request->gia_phong,
                'tien_coc' => 0,
                'mua_nuoc' => 0,
                'dung_mang' => 0,
                'anh_hop_dong' => '',
                'so_du' => 0,
                'mo_ta' => $request->mo_ta ?? 'Không có',
                'trang_thai' => 0,
            ];
            $this->phongtro->traPhong($id_phong);
        }
        else{
            if($request->file('anh_hop_dong'))
            {
                $anh_hop_dong = $request->file('anh_hop_dong')->getClientOriginalName();
                $request->file('anh_hop_dong')->move(public_path('uploads'), $anh_hop_dong);
                // $data['anh_hop_dong'] = $anh_hop_dong;
            }
            $data = [
                'ten_phong' => $request->ten_phong,
                'id_tang' => $request->id_tang,
                'gia_phong' => $request->gia_phong,
                'tien_coc' => (int)$request->tien_coc,
                'mua_nuoc' => $request->mua_nuoc ?? 0,
                'dung_mang' => $request->has('dung_mang') ? 1: 0,
                'anh_hop_dong' => $anh_hop_dong ?? 'default.png',
                'so_du' => $request->so_du ?? 0,
                'mo_ta' => $request->mo_ta ?? 'Không có',
                'trang_thai' => $request->has('trang_thai') ? 1: 0,
            ];
        }
        return $this->phongtro->update($id_phong,$data);
    }
    public function countnguoidangthue($id_phong)
    {
        return $this->phongtro->countnguoi($id_phong);
    }
    public function getone($id)
    {
        return $this->phongtro->find($id);
    }
}
?>