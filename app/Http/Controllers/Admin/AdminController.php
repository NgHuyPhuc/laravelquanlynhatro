<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NhaTro\NhaTroController;
use App\Models\PhongTro;
use App\Services\PhongTroService\PhongTroService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $nhatroController;
    protected $phongTro;
    public function __construct(NhaTroController $nhatroController,PhongTroService $phongTro)
    {
        $this->nhatroController = $nhatroController;
        $this->phongTro = $phongTro;
    }
    //
    public function index(){
        $data['nhatro'] = $this->nhatroController->getall();
        return view('backend.index', $data);
    }
    public function test($id_phongtro)
    {
        $monthNow = Carbon::now();
        $data['month'] = $monthNow->subMonth(1);
        dd($data['month']);
        // $month = Carbon::parse('2025-1-20')->subMonth(1)->format('d-m-Y');
        // ->month;
        // dd($month);
        // return $this->phongTro->resetMuaNuoc($id_phongtro);
        // return PhongTro::where('id', $id_phongtro)->update(['mua_nuoc' => 0]);
    }
}
