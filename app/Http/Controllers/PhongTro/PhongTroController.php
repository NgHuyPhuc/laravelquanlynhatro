<?php

namespace App\Http\Controllers\PhongTro;

use App\Http\Controllers\Controller;
use App\Models\SoDienNuocTheoPhong;
use App\Services\HoaDonService\HoaDonService;
use App\Services\PhongTroService\PhongTroService;
use App\Services\SoDienNuocTheoPhongService\SoDienNuocTheoPhongService;
use App\Services\TangService\TangService;
use App\Services\ThongTinNguoiThueService\ThongTinNguoiThueService;
use Illuminate\Http\Request;

class PhongTroController extends Controller
{
    //
    protected $tangService;
    protected $phongTroService;
    protected $soDienNuoc;
    protected $nguoiThue;
    protected $sdn;
    protected $hoaDon;
    public function __construct(TangService $tangService, PhongTroService $phongTroService, SoDienNuocTheoPhongService $soDienNuoc, ThongTinNguoiThueService $nguoiThue, SoDienNuocTheoPhongService $sdn, HoaDonService $hoaDon)
    {
        $this->tangService = $tangService;
        $this->phongTroService = $phongTroService;
        $this->soDienNuoc = $soDienNuoc;
        $this->nguoiThue = $nguoiThue;
        $this->sdn = $sdn;
        $this->hoaDon = $hoaDon;
    }
    public function index()
    {
        return view('backend.phongtro.index');
    }
    public function info($id, $id_phong)
    {
        $data['phongtro'] = $this->phongTroService->getone($id_phong);
        $data['id'] = $id;
        $data['check'] = $this->soDienNuoc->count($id_phong);
        return view('backend.phongtro.index', $data);
    }
    public function create($id)
    {
        $data['tang'] = $this->tangService->getall($id);
        return view('backend.phongtro.create', ['id' => $id], $data);
    }
    public function store(Request $request, $id)
    {
        $this->phongTroService->create($request, $id);
        return redirect()->route('nhatro.show', ['id' => $id]);
    }
    public function edit($id, $id_phong)
    {
        $data['tang'] = $this->tangService->getall($id);
        $data['phong'] = $this->phongTroService->getone($id_phong);
        $data['id'] = $id;
        return view('backend.phongtro.edit', $data);
    }
    public function update(Request $request, $id, $id_phong)
    {
        $this->phongTroService->update($request, $id_phong);
        return redirect()->route('nhatro.phong.show.info', ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function destroy($id, $id_phong)
    {
        // dd($id_phong);
        $this->phongTroService->getone($id_phong)->nguoithue()->delete();
        $this->sdn->getbyphong($id_phong)->delete();
        $this->hoaDon->getByIdPhong($id_phong)->delete();
        $this->phongTroService->delete($id_phong);
    }
    public function muaNuoc($id, $id_phong)
    {
        $result = $this->phongTroService->muaNuoc($id_phong);
        $phong = $this->phongTroService->getone($id_phong);
        return response()->json([
            'message' => 'Mua bình nước thành công!',
            'mua_nuoc' => $phong->mua_nuoc
        ]);
    }
    public function truNuoc($id, $id_phong)
    {
        $result = $this->phongTroService->truNuoc($id_phong);
        $phong = $this->phongTroService->getone($id_phong);
        return response()->json([
            'message' => 'Trừ bình nước thành công!',
            'mua_nuoc' => $phong->mua_nuoc
        ]);
    }
}
