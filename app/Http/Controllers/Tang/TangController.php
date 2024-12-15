<?php

namespace App\Http\Controllers\Tang;

use App\Http\Controllers\Controller;
use App\Http\Requests\TangCreateRequest;
use App\Services\TangService\TangService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TangController extends Controller
{
    protected $tangService;
    public function __construct(TangService $tangService){
        $this->tangService = $tangService;
    }
    public function index($id){
        $data['tang'] = $this->tangService->getall($id);
        $data['id'] = $id;
        return view('backend.tang.index',$data);
    }
    public function create($id){
        $data['id'] = $id;
        return view('backend.tang.create',$data);
    }
    public function store(TangCreateRequest $request,$id){
        try {
            $this->tangService->create($request,$id);
            return redirect()->route('nhatro.tang.show',['id' => $id]);
    
        } catch (QueryException $e) {
            // Kiểm tra mã lỗi nếu trùng lặp giá trị unique
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors(['error' => 'Tầng đã tồn tại trong nhà trọ này.']);
            }
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
        }
        
    }
    public function edit($id,$id_tang){
        try{
            $data['id'] = $id;
            $data['tang'] = $this->tangService->getone($id_tang);
            return view('backend.tang.edit',$data);
        }
        catch (QueryException $e) {
            // Kiểm tra mã lỗi nếu trùng lặp giá trị unique
            if ($e) {
                return redirect()->back()->withErrors(['error']);
            }
            return redirect()->back()->withErrors(['error']);
        }
    }
    public function update(Request $request,$id , $id_tang ){
        try{
            $this->tangService->update($request, $id_tang);
            return redirect()->route('nhatro.tang.show',['id' => $id]);
        }
        catch (QueryException $e) {
            // Kiểm tra mã lỗi nếu trùng lặp giá trị unique
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors(['error' => 'Tầng (Số) đã tồn tại trong nhà trọ này.']);
            }
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau.']);
        }
    }
    public function destroy($id ,$id_tang){
        $this->tangService->delete($id_tang);
        return redirect()->route('nhatro.tang.show',['id' => $id]);
    }
}
