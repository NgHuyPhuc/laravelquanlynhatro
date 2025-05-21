<?php

namespace App\Http\Controllers\SoDienNuocTheoPhong;

use App\Http\Controllers\Controller;
use App\Imports\SoDienNuocTheoPhongImport;
use App\Models\SoDienNuocTheoPhong;
use App\Services\ChiPhiDichVuService\ChiPhiDichVuService;
use App\Services\NhaTroService\NhaTroService;
use App\Services\PhongTroService\PhongTroService;
use App\Services\SoDienNuocTheoPhongService\SoDienNuocTheoPhongService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SoDienNuocTheoPhongController extends Controller
{
    protected $soDienNuoc;
    protected $phongTro;
    protected $nhatroService;
    protected $chiPhiDichVuService;
    public function __construct(SoDienNuocTheoPhongService $soDienNuoc, PhongTroService $phongTro, NhaTroService $nhatroService, ChiPhiDichVuService $chiPhiDichVuService){
        $this->soDienNuoc = $soDienNuoc;
        $this->phongTro = $phongTro;
        $this->nhatroService = $nhatroService;
        $this->chiPhiDichVuService = $chiPhiDichVuService;
    }
    public function index($id, $id_phong){
        $data['diennuoc'] = $this->soDienNuoc->getbyphong($id_phong)->orderby('date','desc')->paginate(4);
        $data['phong'] = $this->phongTro->getone($id_phong);
        $data['check'] = $this->soDienNuoc->checkExists($id_phong);
        return view('backend.sodiennuoc.all', $data);
    }
    public function danhsachsdn(Request $request,$id){
        $monthYear = $request->input('month');
        if ($monthYear) {
            // Tách năm và tháng
            list($year, $month) = explode('-', $monthYear);
            // Truy vấn dữ liệu theo tháng và năm
            $data['thongtin'] = $this->nhatroService->getTangandPhongTro($id);
            $data['year'] = $year;
            $data['month'] = $month;
            $data['checkCpdv'] = $this->chiPhiDichVuService->getByNhaTroID($id)->count();
            return view('backend.sodiennuoc.danhsach', $data);
        }
        else{
            $monthNow = Carbon::now();
            $data['month'] = $monthNow->month - 1;
            $data['year'] = $monthNow->year;
            $data['thongtin'] = $this->nhatroService->getTangandPhongTro($id);
            $data['checkCpdv'] = $this->chiPhiDichVuService->getByNhaTroID($id)->count();
            return view('backend.sodiennuoc.danhsach', $data);
        }
    }
    public function nhaptatcasdn($id) {
        $monthNow = Carbon::now()->month;
        $data['month'] = $monthNow - 1;
        $data['thongtin'] = $this->nhatroService->getTangandPhongTro($id);
        $data['checkCpdv'] = $this->chiPhiDichVuService->getByNhaTroID($id)->count();
        return view('backend.sodiennuoc.nhaptatcasdn', $data);
    }
    public function nhaptatcasdnPost(Request $request, $id) {
        $data['thongtin'] = $this->nhatroService->getTangandPhongTro($id);
        $data['checkCpdv'] = $this->chiPhiDichVuService->getByNhaTroID($id)->count();
        $this->soDienNuoc->createMultiple($request,$id);
        return redirect()->route('get.danhsachsdn', ['id' => $id]);
    }
    public function create($id, $id_phong){
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $monthNow = Carbon::now()->month;
        $monthSdnLast = Carbon::parse($this->soDienNuoc->getLastest($id_phong)->date)->month;
        $data['month'] = $monthNow - 1;
        $data['checksdn'] = 0;
        $data['sdnSecond'] = $this->soDienNuoc->getLastest($id_phong);
        $data['check'] = $this->soDienNuoc->checkExists($id_phong);
        if($monthNow == $monthSdnLast)
        {
            $data['checksdn'] = 1;
        }
        return view('backend.sodiennuoc.create',$data);
    }
    public function store(Request $request, $id, $id_phong){
        $this->soDienNuoc->create($request, $id_phong);
        return redirect()->route('danh.sach.so.dien.nuoc', ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function firstCreate($id, $id_phong){
        $data['check'] = false;
        $data['id'] = $id;
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        return view('backend.hoadon.sodiennuochientai',$data);
    }
    public function postFirstCreate(Request $request, $id, $id_phong){
        $data['check'] = 0;
        $this->soDienNuoc->firstCreate($request, $id_phong);
        return redirect()->route('nhatro.phong.show.info', ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function edit($id, $id_phong, $id_sdn){
        $data['id_phong'] = $id_phong;
        $data['phong'] = $this->phongTro->getone($id_phong);
        $data['sdn'] = $this->soDienNuoc->getone($id_sdn);
        $data['check'] = $this->soDienNuoc->checkExists($id_phong);
        return view('backend.sodiennuoc.edit',$data);
    }
    public function update(Request $request, $id, $id_phong){
        $this->soDienNuoc->update($request, $id_phong);
        return redirect()->route('danh.sach.so.dien.nuoc', ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function delete($id, $id_phong, $id_sdn){
        $this->soDienNuoc->delete($id_sdn);
        return redirect()->route('danh.sach.so.dien.nuoc', ['id' => $id, 'id_phong' => $id_phong]);
    }
    public function GetImportSdnExcel(Request $request, $id){
        $data['thongtin'] = $this->nhatroService->getTangandPhongTro($id);
        $data['checkCpdv'] = $this->chiPhiDichVuService->getByNhaTroID($id)->count();
        return view('backend.sodiennuoc.sdnexcel', $data);
    }
    public function PostImportSdnExcel(Request $request){
        // Excel::import(new SoDienNuocTheoPhongImport, request()->file('your_file'));
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        $file = $request->file('file');

        // Thực hiện import
        Excel::import(new SoDienNuocTheoPhongImport, $file);

        // Trả về thông báo thành công
        return back()->with('success', 'Dữ liệu đã được nhập thành công!');
    }
}
