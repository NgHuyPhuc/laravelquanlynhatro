<?php

namespace App\Services\SoDienNuocTheoPhongService;

use App\Repositories\Repository\SoDienNuocTheoPhongRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoDienNuocTheoPhongService
{
    protected $soDienNuoc;
    public function __construct(SoDienNuocTheoPhongRepository $soDienNuocRepository)
    {
        $this->soDienNuoc = $soDienNuocRepository;
    }
    public function getall()
    {
        return $this->soDienNuoc->all();
    }
    public function getbyphong($id_phong)
    {
        return $this->soDienNuoc->getByPhong($id_phong);
    }
    public function create(Request $request, $id_phong)
    {
        $data = [
            'id_phong_tro' => $id_phong,
            'date' => $request->date,
            'so_dien' => $request->so_dien,
            'so_nuoc' => $request->so_nuoc,
            'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh ?? 'Không có',
            'tien_phat_sinh' => $request->tien_phat_sinh ?? 0,
        ];
        return $this->soDienNuoc->create($data);
    }
    public function getone($id)
    {
        return $this->soDienNuoc->find($id);
    }
    public function firstcreate(Request $request, $id_phong)
    {
        $data = [
            'id_phong_tro' => $id_phong,
            'date' => $request->date,
            'so_dien' => $request->so_dien,
            'so_nuoc' => $request->so_nuoc,
            'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh ?? 'Không có',
            'tien_phat_sinh' => $request->tien_phat_sinh ?? 0,
        ];
        return $this->soDienNuoc->create($data);
    }
    public function getLastest($id_phong)
    {
        return $this->soDienNuoc->getLastest($id_phong);
    }
    public function getSecondLast($id_phong)
    {
        return $this->soDienNuoc->getSecondLastest($id_phong);
    }
    public function count($id_phong)
    {
        return $this->soDienNuoc->countdata($id_phong);
    }
    public function checkExists($id_phong)
    {
        return $this->soDienNuoc->countdata($id_phong);
    }
    public function createMultiple(Request $request)
    {
        $id_phongs = $request['id_phong'];
        $so_dien_inputs = $request['so_dien'];
        $so_nuoc_inputs = $request['so_nuoc'];

        $errors = [];
        foreach ($id_phongs as $index => $id_phong) {
            // Lấy bản ghi cuối cùng của số điện nước của phòng
            $lastRecord = $this->soDienNuoc->getLastest($id_phong);
            $ten_phong = $this->soDienNuoc->getOneWithIdPhong($id_phong)->phongtro->ten_phong;
            if ($lastRecord) {
                $lastSoDien = $lastRecord->so_dien ?? 0;
                $lastSoNuoc = $lastRecord->so_nuoc ?? 0;
                // Kiểm tra số điện
                if ($so_dien_inputs[$index] < $lastSoDien) {
                    $errors["so_dien.$index"] = "Số điện của phòng $ten_phong phải lớn hơn hoặc bằng $lastSoDien.";
                }

                // Kiểm tra số nước
                if ($so_nuoc_inputs[$index] < $lastSoNuoc) {
                    $errors["so_nuoc.$index"] = "Số nước của phòng $ten_phong phải lớn hơn hoặc bằng $lastSoNuoc.";
                }
            }
        }
        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $dataToInsert = [];
        foreach ($request['id_phong'] as $key => $id_phong) {
            $dataToInsert[] = [
                'id_phong_tro' => $id_phong,
                'date' => $request->date,
                'so_dien' => $request['so_dien'][$key],
                'so_nuoc' => $request['so_nuoc'][$key],
                'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh[$key] ?? 'Không có',
                'tien_phat_sinh' => $request->tien_phat_sinh[$key] ?? 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // Thêm mới hàng loạt
        DB::beginTransaction();
        try {
            $this->soDienNuoc->createMany($dataToInsert);
            DB::commit();
            return redirect()->route('danh.sach.so.dien.nuoc')->with('success', 'Thêm dữ liệu thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            // return redirect()->back()->withErrors('Có lỗi xảy ra: ' . $e->getMessage());
            return 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }
    public function update($request, $id){
        $data = [
            'id_phong_tro' => $request->id_phong,
            'date' => $request->date,
            'so_dien' => $request->so_dien,
            'so_nuoc' => $request->so_nuoc,
            'chi_phi_phat_sinh' => $request->chi_phi_phat_sinh ?? 'Không có',
            'tien_phat_sinh' => $request->tien_phat_sinh ?? 0,
        ];
        return $this->soDienNuoc->update($request->id_sdn, $data);
    }
    public function delete($id){
        $this->soDienNuoc->delete($id);
    }
}
