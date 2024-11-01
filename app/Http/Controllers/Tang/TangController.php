<?php

namespace App\Http\Controllers\Tang;

use App\Http\Controllers\Controller;
use App\Services\TangService\TangService;
use Illuminate\Http\Request;

class TangController extends Controller
{
    protected $tangService;
    public function __construct(TangService $tangService){
        $this->tangService = $tangService;
    }
    //
    public function index($id){
        $data['tang'] = $this->tangService->getall($id);
        $data['id'] = $id;
        return view('backend.tang.index',$data);
    }
    public function create($id){
        $data['id'] = $id;
        return view('backend.tang.create',$data);
    }
    public function store(Request $request,$id){
        $this->tangService->create($request,$id);
        return redirect()->route('nhatro.tang.show',['id' => $id]);
    }
    public function edit($id,$id_tang){
        $data['id'] = $id;
        $data['tang'] = $this->tangService->getone($id_tang);
        return view('backend.tang.edit',$data);
    }
    public function update(Request $request,$id , $id_tang ){
        // dd($id_tang);
        $this->tangService->update($request, $id_tang);
        return redirect()->route('nhatro.tang.show',['id' => $id]);
    }
    public function destroy($id ,$id_tang){
        $this->tangService->delete($id_tang);
        return redirect()->route('nhatro.tang.show',['id' => $id]);
    }
}
