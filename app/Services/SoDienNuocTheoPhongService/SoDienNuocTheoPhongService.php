<?php

namespace App\Services\SoDienNuocTheoPhongService;

use App\Repositories\Repository\SoDienNuocTheoPhongRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            'chi_phi_phat_sinh' => $request->tong_chi_phi_dich_vu ?? 'Không có',
            'tien_phat_sinh' => $request->tong_chi_phi_dich_vu ?? 0,
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
            'chi_phi_phat_sinh' => $request->tong_chi_phi_dich_vu ?? 'Không có',
            'tien_phat_sinh' => $request->tong_chi_phi_dich_vu ?? 0,
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
    public function createMultiple(Request $request)
    {
        // // Xác thực dữ liệu
        // $validated = $request->validate([
        //     'id_phong' => 'required|array',
        //     'id_phong.*' => 'exists:phong_tro,id',
        //     'so_dien' => 'required|array',
        //     'so_dien.*' => 'integer|min:0',
        //     'so_nuoc' => 'required|array',
        //     'so_nuoc.*' => 'integer|min:0',
        // ]);

        // // Lặp qua dữ liệu và chuẩn bị mảng để thêm mới
        // $dataToInsert = [];
        // foreach ($validated['id_phong'] as $key => $id_phong) {
        //     $dataToInsert[] = [
        //         'id_phong_tro' => $id_phong,
        //         'date' => now()->toDateString(), // Hoặc lấy từ $request->date nếu cần
        //         'so_dien' => $validated['so_dien'][$key],
        //         'so_nuoc' => $validated['so_nuoc'][$key],
        //         'chi_phi_phat_sinh' => $request->tong_chi_phi_dich_vu[$key] ?? 'Không có',
        //         'tien_phat_sinh' => $request->tong_chi_phi_dich_vu[$key] ?? 0,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }
        // Xác thực dữ liệu

        // Lặp qua dữ liệu và chuẩn bị mảng để thêm mới
        $dataToInsert = [];
        foreach ($request['id_phong'] as $key => $id_phong) {
            $dataToInsert[] = [
                'id_phong_tro' => $id_phong,
                'date' => now()->toDateString(), // Hoặc lấy từ $request->date nếu cần
                'so_dien' => $request['so_dien'][$key],
                'so_nuoc' => $request['so_nuoc'][$key],
                'chi_phi_phat_sinh' => $request->tong_chi_phi_dich_vu[$key] ?? 'Không có',
                'tien_phat_sinh' => $request->tong_chi_phi_dich_vu[$key] ?? 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // dd($dataToInsert);
        // Thêm mới hàng loạt
        $this->soDienNuoc->createMany($dataToInsert);
        // return redirect()->back()->with('success', 'Thêm dữ liệu thành công!');
    }
}
