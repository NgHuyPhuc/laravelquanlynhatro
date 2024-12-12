@extends('backend/master/master')
@section('title', 'Danh sách hóa đơn')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <h4 class="card-title">Quản lý nhà cho thuê: {{ $nhatro->ten }}</h4>
                <a href="./suatennhatro.html" class=" ml-3"> Sửa tên</a>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <hr />
                        <p class="btn-danger">{{ $error }}</p>
                    @endforeach
                @endif
                @if ($checkCpdv == 0)
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Chức năng</h4>
                                <a href="{{ route('nhatro.themchiphi', ['id' => $nhatro->id]) }}" type="button"
                                    class="ml-3 btn btn-danger mb-4">Yêu cầu thêm mới chi phí dịch vụ
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Chức năng</h4>
                                <a href="{{ route('nhatro.tang.show', ['id' => $nhatro->id]) }}" type="button"
                                    class="btn btn-success mb-4">Quản Lý Tầng
                                </a>
                                <a href="{{ route('phongtro.themphong', ['id' => $nhatro->id]) }}" type="button"
                                    class="ml-3 btn btn-success mb-4">Thêm mới Phòng
                                </a>
                                <a href="{{ route('get.nhaptatcasdn', ['id' => $nhatro->id]) }}" type="button"
                                    class="ml-3 btn btn-success mb-4">Nhập số điện nước
                                </a>

                                @if ($checkCpdv == 1)
                                    <a href="{{ route('nhatro.chiphi.show', ['id' => $nhatro->id]) }}" type="button"
                                        class="ml-3 btn btn-success mb-4">Quản lý chi phí dịch vụ
                                    </a>
                                @else
                                    <a href="{{ route('nhatro.themchiphi', ['id' => $nhatro->id]) }}" type="button"
                                        class="ml-3 btn btn-success mb-4">Thêm mới chi phí dịch vụ
                                    </a>
                                @endif
                                <hr>
                                <br>
                                <a href="{{ route('get.nhaptatcasdn', ['id' => $nhatro->id]) }}" type="button"
                                    class="btn btn-success mb-4">Nhập số điện nước
                                </a>
                                <button type="button" class="ml-3 btn btn-primary mb-4" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Tạo tất cả hóa đơn
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Xác nhận tạo tất cả hóa đơn cho lần nhập số điện nước này
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                <a href="{{ route('Tao.tat.ca.hoa.don', ['id' => $nhatro->id]) }}"
                                                    type="button" class="ml-3 btn btn-success">Tạo tất cả hóa đơn
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('phong.hoadon.danhsach.all', ['id' => $nhatro->id]) }}" type="button"
                                    class="ml-3 btn btn-success mb-4">Danh sách hóa đơn tháng này
                                </a>
                                <div type="button" class="ml-3 btn btn-info mb-4"> Tìm kiếm
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách hóa đơn phòng 301</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                Phòng
                                            </th>
                                            <th>
                                                Tháng
                                            </th>
                                            <th>
                                                Tổng tiền nhà
                                            </th>

                                            <th>
                                                Số dư
                                            </th>
                                            <th>
                                                Trạng thái
                                            </th>
                                            <th>
                                                Chức năng
                                            </th>
                                        </tr>
                                    </thead>
                                    @php
                                        $total = 0;
                                    @endphp
                                    <tbody>
                                        @foreach ($hoadon as $key => $item)
                                            <tr>
                                                <td class="">
                                                    {{ $item->phongtro->ten_phong }}
                                                </td>
                                                <td>
                                                    {{ $item->thang }}
                                                </td>
                                                <td>
                                                    {{ number_format($item->so_tien_phai_tra) }} VNĐ
                                                    <p hidden> {{ $total = $total + $item->so_tien_phai_tra }}</p>
                                                </td>
                                                <td>
                                                    @if ($item->so_du < 0)
                                                        <p style="color: white" class="btn btn-warning">
                                                            {{ number_format($item->so_du) }} VNĐ</p>
                                                    @else
                                                        <p style="color: white" class="btn btn-success">
                                                            {{ number_format($item->so_du) }} VNĐ</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->trang_thai == 2)
                                                        <p class="btn btn-success">Đã thanh toán</p>
                                                    @elseif($item->trang_thai == 1)
                                                        <p style="color: white" class="btn btn-warning">Chưa thanh toán đủ
                                                        </p>
                                                    @else
                                                        <p style="color: white" class="btn btn-warning">Chưa thanh toán</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('phongtro.hoadon.detailhoadon', ['id' => $nhatro->id, 'id_phong' => $item->id_phong_tro, 'id_hoadon' => $item->id]) }}"
                                                        class="btn btn-success" style="color: white;">Xem chi tiết</a>
                                                    <a href="{{ route('hoadontro.suahoadon.get', ['id' => $nhatro->id, 'id_phong' => $item->id_phong_tro, 'id_hoadon' => $item->id]) }}"
                                                        class="btn btn-warning ml-3" style="color: white;">Chỉnh sửa</a>
                                                    <a href="" class="btn btn-danger ml-3">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h3>Tổng tiền : {{ number_format($total) }}</h3>
                        <div class="d-flex justify-content-end align-items-center">
                            <p class="mr-3">Trang: </p>
                            {{ $hoadon->links('backend.pagination.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
