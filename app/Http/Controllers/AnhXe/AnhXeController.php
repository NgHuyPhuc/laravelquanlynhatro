<?php

namespace App\Http\Controllers\AnhXe;

use App\Http\Controllers\Controller;
use App\Services\AnhXeService\AnhXeService;
use App\Services\ThongTinNguoiThueService\ThongTinNguoiThueService;
use Illuminate\Http\Request;

class AnhXeController extends Controller
{
    //
    protected $anhxe;
    protected $ngthue;
    public function __construct(AnhXeService $anhXeService, ThongTinNguoiThueService $ThongTinNguoiThueService)
    {
        $this->anhxe = $anhXeService;
        $this->ngthue = $ThongTinNguoiThueService;
    }
    public function index($id, $id_nguoithue)
    {
        // dd('alo');
        $data['ngthue'] = $this->ngthue->getone($id_nguoithue);
        $data['anhxe'] = $this->anhxe->getByIdNgThue($id_nguoithue)->get();
        return view('backend.anhxe.index', $data);
    }
    public function create($id, $id_nguoithue)
    {
        $data['ngthue'] = $this->ngthue->getone($id_nguoithue);
        $data['anhxe'] = $this->anhxe->getByIdNgThue($id_nguoithue);
        return view('backend.anhxe.create', $data);
    }
    public function store(Request $request, $id, $id_nguoithue)
    {
        $result = $this->anhxe->createMulti($request, $id, $id_nguoithue);

        if ($result['status'] === 'success') {
            return redirect()->route('ngthue.xe.show', ['id' => $id, 'id_nguoithue' => $id_nguoithue])
                ->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
    public function edit($id, $id_nguoithue, $id_anhxe)
    {
        $data['ngthue'] = $this->ngthue->getone($id_nguoithue);
        $data['anhxe'] = $this->anhxe->getone($id_anhxe);
        return view('backend.anhxe.edit', $data);
    }
    public function update(Request $request, $id, $id_nguoithue, $id_xe)
    {
        // dd($request);
        $result = $this->anhxe->update($request, $id, $id_nguoithue, $id_xe);
        // dd($result);
        if ($result['status'] === 'success') {
            return redirect()->route('ngthue.xe.show', ['id' => $id, 'id_nguoithue' => $id_nguoithue])
                ->with('success', $result['message']);
        } else {
            return redirect()->back()->with('error', $result['message']);
        }
    }
    public function destroy($id, $id_nguoithue, $id_xe) {
        $this->anhxe->delete($id_xe);
        return redirect()->route('ngthue.xe.show', ['id' => $id, 'id_nguoithue' => $id_nguoithue]);
    }
}
