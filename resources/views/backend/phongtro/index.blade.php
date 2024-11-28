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
                                    <h4 class="card-title">Chức năng phòng : {{ $phongtro->ten_phong }}</h4>
                                    <div class="template-demo">
                                        <a href="{{ route('phongtro.nguoithue.themnguoi', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) }}"
                                            class="btn btn-info">Thêm mới người
                                            thuê phòng</a>
                                        @if ($check == 0)
                                            <a href="{{ route('phongtro.hoadon.sodiennuoc1', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) }}"
                                                class="btn btn-success">Thêm mới số tiền điện nước hiện tại</a>
                                        @else
                                            <a href="{{ route('phong.nguoithue.dangthue', ['id' => $id, 'id_phong' => $phongtro->id]) }}"
                                                class="btn btn-info">Xem thông tin người thuê phòng</a>
                                            <a href="{{ route('danh.sach.so.dien.nuoc', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) }}"
                                                class="btn btn-success">Danh sách số điện nước</a>
                                            <a href="{{ route('sodien.nuoc.theophong.get', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) }}"
                                                class="btn btn-success">Nhập số điện nước</a>
                                            <a href="{{ route('phongtro.hoadon.themhoadon', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) }}"
                                                class="btn btn-success">Tạo hóa đơn tiền phòng</a>
                                        @endif
                                        <a href="{{ route('nhatro.phong.hoadon.show.all.info', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) }}"
                                            class="btn btn-success">Xem hóa đơn tiền phòng</a>
                                        <a href="{{ route('phongtro.suaphong.get', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) }}"
                                            class="btn btn-danger">Chỉnh sửa thông tin phòng</a>
                                        {{-- <a href="{{ route('phongtro.xoaphong', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) }}"
                                            class="btn btn-danger float-right">Xóa phòng</a> --}}
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Xóa phòng
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận hành động Xóa</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có chắc chắn muốn thực hiện hành động này không? Hành động này sẽ không thể hoàn tác.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="javascript:void(0)" type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</a>
                                                        <a href="{{ route('phongtro.xoaphong', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) }}" type="button" class="btn btn-primary">Save changes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                    <h4 class="card-title">Thông tin phòng : {{ $phongtro->ten_phong }}</h4>
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
                                                        <h6>{{ $phongtro->nguoidangthue->count() }}</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <h6>Tiền phòng: </h6>
                                                    </td>
                                                    <td>
                                                        <h6>{{ number_format($phongtro->gia_phong) }} đ</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <h6>Tiền cọc: </h6>
                                                    </td>
                                                    <td>
                                                        <h6>{{ number_format($phongtro->tien_coc) }} đ</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <h6>Dùng internet: </h6>
                                                    </td>
                                                    <td>
                                                        <h6>{{ $phongtro->dung_mang ? 'Có' : 'Không' }}</h6>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="template-demo mt-3">
                                            <h6>Số người thuê: {{ $phongtro->nguoidangthue->count() }}</h6>
                                            <h6>Tiền phòng: {{ number_format($phongtro->gia_phong) }} đ</h6>
                                            <h6>Tiền cọc: {{ number_format($phongtro->tien_coc) }} đ</h6>
                                            <h6>Dùng internet: {{ $phongtro->dung_mang ? 'Có' : 'Không' }}</h6>
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
