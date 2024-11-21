<?php
namespace App\Services\ThongTinNguoiThueService;

use App\Repositories\Repository\ThongTinNguoiThueRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if ($request->hasFile('cmnd_mat_trc')) {
            $cmnd_mat_trc = time() . '.' . $request->cmnd_mat_trc->extension();
            $request->cmnd_mat_trc->move(public_path('uploads/img'), $cmnd_mat_trc);
        } else {
            $cmnd_mat_trc = 'no-image.jpg'; // Hoặc giá trị khác phù hợp
        }
    
        if ($request->hasFile('cmnd_mat_sau')) {
            $cmnd_mat_sau = time() . '.' . $request->cmnd_mat_sau->extension();
            $request->cmnd_mat_sau->move(public_path('uploads/img'), $cmnd_mat_sau);
        } else {
            $cmnd_mat_sau = 'no-image.jpg'; // Hoặc giá trị khác phù hợp
        }
        $data = [
            'id_phong_tro' => $request->id_phong,
            'ten' => $request->ten,
            'sdt' => $request->sdt,
            'cmnd_mat_trc' => $cmnd_mat_trc,
            'cmnd_mat_sau' => $cmnd_mat_sau,
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
    public function update(Request $request, $id_nguoi_thue){

        $data = [
            'id_phong_tro' => $request->id_phong,
            'ten' => $request->ten,
            'sdt' => $request->sdt,
            'que_quan' => $request->que_quan,
            'xe' => $request->has('xe') ? 1 : 0,
            'gioi_tinh' => $request->gioi_tinh,
            'trang_thai' => $request->has('trang_thai') ? 1 : 0,
            'ngay_chuyen_toi_o' => Carbon::now()->locale('vi'),
            'ngay_chuyen_di' => null,
        ];

        if ($request->has('trang_thai') && $request->trang_thai == 0) {
            $data['ngay_chuyen_di'] = Carbon::now()->locale('vi');
        }
        $uploadedFiles = [];
        foreach (['cmnd_mat_trc', 'cmnd_mat_sau'] as $field) {
            if ($request->hasFile($field)) {
                // Tạo tên file duy nhất dựa trên thời gian và tên trường
                $fileName = time() . '_' . $field . '.' . $request->file($field)->extension();
                // Di chuyển file vào thư mục public/uploads/img
                $request->file($field)->move(public_path('uploads/img'), $fileName);
                // Lưu tên file vào mảng uploadedFiles
                $uploadedFiles[$field] = $fileName;
            }
        }
        $data = array_merge($data, $uploadedFiles);
        return $this->thongTinNguoiThue->update($id_nguoi_thue, $data);
    }
    public function delete($id)
    {
        return $this->thongTinNguoiThue->delete($id);
    }
}
?>