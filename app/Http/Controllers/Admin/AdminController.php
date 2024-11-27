<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NhaTro\NhaTroController;
use App\Models\PhongTro;
use App\Services\PhongTroService\PhongTroService;
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
        return $this->phongTro->resetMuaNuoc($id_phongtro);
        // return PhongTro::where('id', $id_phongtro)->update(['mua_nuoc' => 0]);
    }
}
