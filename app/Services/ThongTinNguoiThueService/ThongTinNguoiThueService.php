<?php
namespace App\Services\ThongTinNguoiThueService;

use App\Repositories\Repository\ThongTinNguoiThueRepository;
use Carbon\Carbon;
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
    public function create(Request $request)
    {
        if($request->hasFile('cmnd'))
        {
            $cmndtrc = time() . '.' . $request->cmndtrc->extension();
            $request->cmndtrc->move(public_path('uploads/img'), $cmndtrc);
        }
        else{
            $cmndtrc = '';
        }
        $data = [
            'id_phong_tro' => $request->id_phong,
            'ten' => $request->ten,
            'sdt' => $request->sdt,
            'cmnd' => $cmndtrc,
            'que_quan' => $request->que_quan,
            'xe' => $request->has('xe')? 1: 0,
            'gioi_tinh' => $request->gioi_tinh,
            'trang_thai' => $request->has('trang_thai')? 1: 0,
            // 'ngay_chuyen_toi_o' => Carbon::now()->locale('vi')->isoFormat('DD/MM/YYYY'),
            'ngay_chuyen_toi_o' => Carbon::now()->locale('vi'),
            'ngay_chuyen_di' => null,
        ];
        return $this->thongTinNguoiThue->create($data);
    }
    public function getone($id)
    {
        return $this->thongTinNguoiThue->find($id);
    }
    public function update(Request $request, $id, $id_nguoi_thue){
        if($request->hasFile('cmnd'))
        {
            $cmndtrc = time() . '.' . $request->cmnd ->extension();
            $request->cmnd->move(public_path('uploads/img'), $cmndtrc);
            $data = [
                'id_phong_tro' => $request->id_phong,
                'ten' => $request->ten,
                'sdt' => $request->sdt,
                'cmnd' => $cmndtrc,
                'que_quan' => $request->que_quan,
                'xe' => $request->has('xe')? 1: 0,
                'gioi_tinh' => $request->gioi_tinh,
                'trang_thai' => $request->has('trang_thai')? 1: 0,
                // 'ngay_chuyen_toi_o' => Carbon::now()->locale('vi')->isoFormat('DD/MM/YYYY'),
                'ngay_chuyen_toi_o' => Carbon::now()->locale('vi'),
                'ngay_chuyen_di' => null,
            ];
        }
        else{
            $data = [
                'id_phong_tro' => $request->id_phong,
                'ten' => $request->ten,
                'sdt' => $request->sdt,
                'que_quan' => $request->que_quan,
                'xe' => $request->has('xe')? 1: 0,
                'gioi_tinh' => $request->gioi_tinh,
                'trang_thai' => $request->has('trang_thai')? 1: 0,
                // 'ngay_chuyen_toi_o' => Carbon::now()->locale('vi')->isoFormat('DD/MM/YYYY'),
                'ngay_chuyen_toi_o' => Carbon::now()->locale('vi'),
                'ngay_chuyen_di' => null,
            ];
        }
        
        return $this->thongTinNguoiThue->update($id_nguoi_thue, $data);
    }
    public function delete($id)
    {
        return $this->thongTinNguoiThue->delete($id);
    }
}
?>