@extends('backend/master/master')
@section('title', 'Nhà trọ')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="row">
                <h4 class="card-title">Quản lý nhà cho thuê: {{$nhatro->ten}}</h4>
                <a href="./suatennhatro.html" class=" ml-3"> Sửa tên</a>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Chức năng</h4>
                            <a href="{{route('nhatro.tang.show',['id' => $nhatro->id]) }}" type="button" class="btn btn-success mb-4">Quản Lý Tầng
                            </a>
                            <a href="{{route('phongtro.themphong',['id' => $nhatro->id])}}" type="button" class="ml-3 btn btn-success mb-4">Thêm mới Phòng
                            </a>
                            <div type="button" class="ml-3 btn btn-info mb-4"> Tìm kiếm
                            </div>
                            <a href="{{route('nhatro.themchiphi',['id' => $nhatro->id])}}" type="button" class="ml-3 btn btn-success mb-4">Chi phí dịch vụ
                            </a>
                        </div>
                    </div>
                </div>
                {{-- foreach o day --}}
                @foreach ($thongtin->tangdesc as $item)
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-uppercase text-danger">{{$item->ten_tang}}</h3>
                            <div class="row">
                                @foreach ($item->phongtro as $phong)
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">{{$phong->ten_phong}}</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: {{$phong->gia_phong}} đ</h5>
                                            @if ($phong->trang_thai === 0)
                                            
                                                <div type="button"
                                                    class="btn btn-danger btn-rounded btn-fw mb-4">Chưa cho thuê
                                                </div>
                                            @else
                                                <div type="button"
                                                class="btn btn-success btn-rounded btn-fw mb-4">Đang cho
                                                thuê
                                            </div>
                                            <div type="button" class="btn btn-success mb-4">Tiền nhà tháng
                                                9: Đã thanh toán
                                            </div>
                                            <div type="button" class="btn btn-info mb-4">
                                                {{$phong->so_du >= 0 ? 'Số dư' : 'Còn thiếu'}}
                                                 {{$phong->so_du}} VNĐ
                                            </div>
                                            @endif
                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            {{-- <a href="{{route('nhatro.phong.show', ['id' => $thongtin->id, 'id_phong' => $phong->id])}}" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a> --}}
                                                <a href="{{ route('nhatro.phong.show.info', ['id' => $thongtin->id, 'id_phong' => $phong->id]) }}" type="button"
                                                    class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- end foreach o day --}}
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span
                                class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright
                                © 2020 <a href="https://www.bootstrapdash.com/" class="text-muted"
                                    target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                            <span
                                class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Free
                                <a href="https://www.bootstrapdash.com/" class="text-muted"
                                    target="_blank">Bootstrap dashboard</a> templates from
                                Bootstrapdash.com</span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection
