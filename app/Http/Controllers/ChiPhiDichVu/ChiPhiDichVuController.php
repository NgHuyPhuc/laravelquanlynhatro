<?php

namespace App\Http\Controllers\ChiPhiDichVu;

use App\Http\Controllers\Controller;
use App\Services\ChiPhiDichVuService\ChiPhiDichVuService;
use App\Services\NhaTroService\NhaTroService;
use Illuminate\Http\Request;

class ChiPhiDichVuController extends Controller
{
    protected $chiphi;
    protected $nhatro;
    public function __construct(ChiPhiDichVuService $chiphi, NhaTroService $nhatro){
        $this->chiphi = $chiphi;
        $this->nhatro = $nhatro;
    }
    public function index($id){
        $data['chiphi'] = $this->nhatro->getone($id)->chiphidichvu;
        if($data['chiphi'] == null){
            $data['check'] = 1;
        }
        else{
            $data['check'] = 0;
        }
        return view('backend.chiphidichvu.index', $data);
    }
    public function create($id){
        $data['id'] = $id;
        return view('backend.chiphidichvu.create',$data);
    }
    public function store(Request $request, $id){
        $this->chiphi->create($request);
        return redirect()->route('nhatro.chiphi.show',['id' => $id]);
    }
    public function edit($id, $id_chiphi){
        $data['id'] = $id;
        $data['chiphi'] = $this->chiphi->getone($id_chiphi);
        return view('backend.chiphidichvu.edit', $data);
    }
    public function update(Request $request, $id, $id_chiphi){
        $data['id'] = $id;
        $this->chiphi->update($request, $id_chiphi);
        return redirect()->route('nhatro.chiphi.show',['id' => $id]);
    }
    public function destroy($id, $id_phong){
        
    }
}
