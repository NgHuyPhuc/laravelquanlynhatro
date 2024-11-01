<?php

namespace App\Http\Controllers\NhaTro;

use App\Http\Controllers\Controller;
use App\Models\NhaTro;
use App\Services\NhaTroService\NhaTroService;
use App\Services\TangService\TangService;
use Illuminate\Http\Request;

class NhaTroController extends Controller
{
    protected $nhatro;
    protected $tangService;
    public function __construct(NhaTroService $nhatroService, TangService $tangService)
    {
        $this->nhatro = $nhatroService;
        $this->tangService = $tangService;
    }
    //
    public function getall()
    {
        return $this->nhatro->getall();
    }
    public function create(){
        return view('backend.nhatro.create');
    }

    public function store(Request $request){
        $this->nhatro->create($request);
        return redirect()->route('dashboard');
    }

    public function show($id){
        $data['nhatro'] = $this->nhatro->getone($id);
        $data['tang'] = $this->tangService->getall($id);
        return view('backend.nhatro.index', $data);
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
