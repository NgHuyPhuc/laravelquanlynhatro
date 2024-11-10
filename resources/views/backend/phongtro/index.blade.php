@extends('backend/master/master')
@section('title', 'Quản lý phòng trọ')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h4 class="card-title">Chức năng phòng 301</h4>
                                <div class="template-demo">
                                    <a href="{{route('phongtro.nguoithue.themnguoi',['id' => $nhatro->id, 'id_phong' => $phongtro->id])}}" class="btn btn-info">Thêm mới người
                                        thuê phòng</a>
                                        {{-- phongtro.hoadon.themhoadon --}}
                                    <a href="{{route('nhatro.phong.nguoithue.show.all.info',['id' => $id, 'id_phong' => $phongtro->id])}}" class="btn btn-info">Xem thông tin người thuê phòng</a>
                                    <a href="{{route('phongtro.hoadon.themhoadon',['id' => $nhatro->id, 'id_phong' => $phongtro->id])}}" class="btn btn-success">Tạo hóa đơn tiền phòng</a>
                                    <a href="./xemhoadontiennha.html" class="btn btn-success">Xem hóa đơn tiền phòng</a>
                                    <a href="{{route('phongtro.suaphong.get',['id' => $nhatro->id, 'id_phong' => $phongtro->id])}}" class="btn btn-danger">Chỉnh sửa thông tin phòng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h4 class="card-title">Thông tin phòng 301</h4>
                                @if ($phongtro->trang_thai == 0)
                                    Phòng chưa được cho thuê
                                @else
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="py-1">
                                                <h6>Số người thuê:</h6>
                                            </td>
                                            <td>
                                                <h6>{{$phongtro->nguoidangthue->count()}}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-1">
                                                <h6>Tiền phòng: </h6>
                                            </td>
                                            <td>
                                                <h6>{{$phongtro->gia_phong}} đ</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-1">
                                                <h6>Dùng internet: </h6>
                                            </td>
                                            <td>
                                                <h6>{{$phongtro->dung_mang ? 'Có' : 'Không'}}</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="template-demo mt-3">
                                    <h6>Số người thuê: {{$phongtro->nguoidangthue->count()}}</h6>
                                    <h6>Tiền phòng: {{$phongtro->gia_phong}} đ</h6>
                                    <h6>Dùng internet: {{$phongtro->dung_mang ? 'Có' : 'Không'}}</h6>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
