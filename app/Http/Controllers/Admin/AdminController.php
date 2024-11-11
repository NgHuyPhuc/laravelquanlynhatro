<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NhaTro\NhaTroController;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $nhatroController;
    public function __construct(NhaTroController $nhatroController)
    {
        $this->nhatroController = $nhatroController;
    }
    //
    public function index(){
        $data['nhatro'] = $this->nhatroController->getall();
        return view('backend.index', $data);
    }
}
