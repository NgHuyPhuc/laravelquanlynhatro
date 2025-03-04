<?php

namespace App\Services\AnhXeService;

use App\Models\AnhXe;
use App\Repositories\Repository\AnhXeRepository;
use Illuminate\Http\Request;

class AnhXeService
{
    protected $anhxe;
    public function __construct(AnhXeRepository $AnhXeRepository)
    {
        $this->anhxe = $AnhXeRepository;
    }
    public function getById($id)
    {
        return $this->anhxe->find($id);
    }
    public function getByIdNgThue($id_nguoithue)
    {
        return $this->anhxe->getByIdNgThue($id_nguoithue);
    }
    public function create(Request $request, $id)
    {
        $data = [
            'id_nha_tro' => $id,
            'ten_tang' => $request->ten_tang,
            'ten_tang_so' => $request->ten_tang_so,
        ];
        return $this->anhxe->create($data);
    }
    public function createMulti(Request $request, $id, $id_nguoithue)
    {
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $name_image = time() . '_' . $image->getClientOriginalName();
                try {
                    $image->move(public_path('uploads/img/Anhxe'), $name_image);
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Lỗi khi lưu ảnh: ' . $e->getMessage());
                }
                $data = [
                    'id_nguoi_thue' => $id_nguoithue,
                    'anh_xe' => $name_image,
                ];
                $this->anhxe->create($data);
            }
            // return redirect()->route('ngthue.xe.show', ['id' => $id, 'id_nguoithue' => $id_nguoithue])->with('success', 'Ảnh đã được upload thành công!');
            return [
                'status' => 'success',
                'message' => 'Ảnh đã được upload thành công!',
            ];
        } else {
            // return redirect()->back()->with('error', 'Vui lòng chọn ảnh!');
            return [
                'status' => 'error',
                'message' => 'Vui lòng chọn ảnh!',
            ];
        }
    }
    public function getone($id)
    {
        return $this->anhxe->find($id);
    }
    public function update(Request $request, $id, $id_nguoithue, $id_xe)
    {
        // dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
            // $image = $request->file('image');
            $name_image = time() . '_' . $request->file('image')->getClientOriginalName();
            try {
                $request->file('image')->move(public_path('uploads/img/Anhxe'), $name_image);
            } catch (\Exception $e) {
                return [
                    'status' => 'error',
                    'message' => 'Vui lòng chọn ảnh!',
                ];
            }
            $data = [
                'anh_xe' => $name_image,
            ];
            $this->anhxe->update($id_xe, $data);
            return [
                'status' => 'success',
                'message' => 'Ảnh đã được cập nhật thành công!',
            ];
            // return redirect()->route('ngthue.xe.show', ['id' => $id, 'id_nguoithue' => $id_nguoithue])->with('success', 'Ảnh đã được upload thành công!');
        }
        else {
            // Trả về thông báo lỗi nếu không có file nào được chọn
            return [
                'status' => 'error',
                'message' => 'Vui lòng chọn ảnh!',
            ];
        }
    }
    public function delete($id)
    {
        return $this->anhxe->delete($id);
    }
}
