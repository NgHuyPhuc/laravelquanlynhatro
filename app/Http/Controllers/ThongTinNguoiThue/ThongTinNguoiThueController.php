<?php

namespace App\Http\Controllers\ThongTinNguoiThue;

use App\Http\Controllers\Controller;
use App\Services\PhongTroService\PhongTroService;
use App\Services\ThongTinNguoiThueService\ThongTinNguoiThueService;
use Illuminate\Http\Request;

class ThongTinNguoiThueController extends Controller
{
    //
    protected $phongService;
    protected $nguoiThueService;
    public function __construct(PhongTroService $phongService, ThongTinNguoiThueService $nguoiThueService)
    {
        $this->phongService = $phongService;
        $this->nguoiThueService = $nguoiThueService;
    }
    public function index($id, $id_phong)
    {
        $data['phong'] = $this->phongService->getone($id_phong);
        $data['nguoidangthue'] = $data['phong']->nguoidangthue()->paginate(3);
        return view('backend.nguoithue.index', $data);
    }
    public function detail($id, $id_phong, $id_nguoi_thue)
    {
        $data['nguoi'] = $this->nguoiThueService->getone($id_nguoi_thue);
        $data['phong'] = $this->phongService->getone($id_phong);
        return view('backend.nguoithue.detail', $data);
    }
    public function infoall($id, $id_phong)
    {
        $data['phong'] = $this->phongService->getone($id_phong);
        $data['nguoi'] = $this->phongService->getone($id_phong)->nguoithue()->orderby('id','desc')->paginate(3);
        return view('backend.nguoithue.all', $data);
    }
    public function create($id, $id_phong)
    {
        $data['phong'] = $this->phongService->getone($id_phong);
        return view('backend.nguoithue.create', $data, ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function store(Request $request, $id, $id_phong)
    {
        $this->nguoiThueService->create($request, $id_phong);
        return redirect()->route('phong.nguoithue.dangthue', ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function edit($id, $id_phong, $id_nguoi_thue)
    {
        $data['nguoithue'] = $this->nguoiThueService->getone($id_nguoi_thue);
        $data['phong'] = $this->phongService->getone($id_phong);
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['id_nguoi_thue'] = $id_nguoi_thue;
        return view('backend.nguoithue.edit', $data);
    }
    public function update(Request $request, $id, $id_phong, $id_nguoi_thue)
    {
        $this->nguoiThueService->update($request, $id_nguoi_thue);
        return redirect()->route('phong.nguoithue.danhsach.all', ['id' => $id, 'id_phong' => $id_phong]);
    }
}
