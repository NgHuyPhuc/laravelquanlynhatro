<?php
namespace App\Services\ChiPhiDichVuService;

use App\Repositories\Repository\ChiPhiDichVuRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChiPhiDichVuService
{
    protected $chiPhiDichVu;
    public function __construct(ChiPhiDichVuRepository $chiPhiDichVuRepository)
    {
        $this->chiPhiDichVu = $chiPhiDichVuRepository;
    }
    public function getall()
    {
        return $this->chiPhiDichVu->all();
    }
    public function create(Request $request)
    {
        // dd($request);
        if($request->hasFile('anh_qr_code'))
        {
            $anhqr = time() . '.' . $request->anh_qr_code->extension();
            $request->anh_qr_code->move(public_path('uploads/img'), $anhqr);
        }
        else{
            $anhqr = '';
        }
        $data = [
            'id_nha_tro' => $request->id_nha_tro,
            'tien_dien_int' => $request->tien_dien_int,
            'tien_nuoc_int' => $request->tien_nuoc_int,
            'tien_mang_int' => $request->tien_mang_int,
            'tien_binh_nuoc' => $request->tien_binh_nuoc,
            'anh_qr_code' => $anhqr,
        ];
        return $this->chiPhiDichVu->create($data);
    }
    public function update(Request $request , $id_chiphi)
    {
        // dd($request);
        if($request->hasFile('anh_qr_code'))
        {
            $anhqr = time() . '.' . $request->anh_qr_code->extension();
            $request->anh_qr_code->move(public_path('uploads/img'), $anhqr);
            $data = [
                'id_nha_tro' => $request->id_nha_tro,
                'tien_dien_int' => $request->tien_dien_int,
                'tien_nuoc_int' => $request->tien_nuoc_int,
                'tien_mang_int' => $request->tien_mang_int,
                'tien_binh_nuoc' => $request->tien_binh_nuoc,
                'anh_qr_code' => $anhqr,
            ];
        }
        else{
            $data = [
                'id_nha_tro' => $request->id_nha_tro,
                'tien_dien_int' => $request->tien_dien_int,
                'tien_nuoc_int' => $request->tien_nuoc_int,
                'tien_mang_int' => $request->tien_mang_int,
                'tien_binh_nuoc' => $request->tien_binh_nuoc,
            ];
        }
        
        return $this->chiPhiDichVu->update($id_chiphi, $data);
    }
    public function getone($id)
    {
        return $this->chiPhiDichVu->find($id);
    }
}
?>