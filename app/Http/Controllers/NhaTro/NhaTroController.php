<?php

namespace App\Http\Controllers\NhaTro;

use App\Http\Controllers\Controller;
use App\Models\NhaTro;
use App\Services\NhaTroService\NhaTroService;
use Illuminate\Http\Request;

class NhaTroController extends Controller
{
    protected $nhatro;
    public function __construct(NhaTroService $nhatroService)
    {
        $this->nhatro = $nhatroService;
    }
    //

    public function create(){
        return view('backend.nhatro.create');
    }

    public function store(Request $request){
        $this->nhatro->create($request);
        return redirect()->route('dashboard');
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
