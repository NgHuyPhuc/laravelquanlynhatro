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
                            <a href="{{route('nhatro.themtang',['id' => $nhatro->id]) }}" type="button" class="btn btn-success mb-4">Thêm mới Tầng
                            </a>
                            <a href="{{route('phongtro.create',['id' => $nhatro->id])}}" type="button" class="btn btn-success mb-4">Thêm mới Phòng
                            </a>
                            <div type="button" class="btn btn-info mb-4"> Tìm kiếm
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-uppercase text-danger">Tầng 3</h3>
                            <div class="row">
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 301</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-success btn-rounded btn-fw mb-4">Đang cho
                                                thuê
                                            </div>
                                            <div type="button" class="btn btn-success mb-4">Tiền nhà tháng
                                                9: Đã thanh toán
                                            </div>
                                            <div type="button" class="btn btn-info mb-4">Tiền thừa 2.000 VNĐ
                                            </div>

                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="./chitietphongtro.html" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 302</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-success btn-rounded btn-fw mb-4">Đang cho
                                                thuê
                                            </div>
                                            <div type="button" class="btn btn-danger mb-4">Tiền nhà tháng 9:
                                                Chưa thanh toán
                                            </div>
                                            <div type="button" class="btn btn-warning mb-4">Tiền nợ 500.000
                                                VNĐ
                                            </div>
                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 303</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-danger btn-rounded btn-fw mb-4">Chưa cho thuê
                                            </div>

                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 304</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-danger btn-rounded btn-fw mb-4">Chưa cho thuê
                                            </div>
                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-danger text-uppercase ">Tầng 2</h3>
                            <div class="row">
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 201</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-success btn-rounded btn-fw mb-4">Đang cho
                                                thuê
                                            </div>
                                            <div type="button" class="btn btn-success mb-4">Tiền nhà tháng
                                                9: Đã thanh toán
                                            </div>

                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 202</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-danger btn-rounded btn-fw mb-4">Chưa cho thuê
                                            </div>

                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 203</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-success btn-rounded btn-fw mb-4">Đang cho
                                                thuê
                                            </div>
                                            <div type="button" class="btn btn-danger mb-4">Tiền nhà tháng 9:
                                                Chưa thanh toán
                                            </div>
                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 204</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-danger btn-rounded btn-fw mb-4">Chưa cho thuê
                                            </div>
                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-uppercase text-danger">Tầng 1</h3>
                            <div class="row">
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 101</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-success btn-rounded btn-fw mb-4">Đang cho
                                                thuê
                                            </div>
                                            <div type="button" class="btn btn-success mb-4">Tiền nhà tháng
                                                9: Đã thanh toán
                                            </div>

                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 102</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-danger btn-rounded btn-fw mb-4">Chưa cho thuê
                                            </div>

                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 103</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-success btn-rounded btn-fw mb-4">Đang cho
                                                thuê
                                            </div>
                                            <div type="button" class="btn btn-danger mb-4">Tiền nhà tháng 9:
                                                Chưa thanh toán
                                            </div>
                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column ">
                                            <div class="mb-2">
                                                <h4 class="mb-0 ">Phòng: 104</h4>
                                            </div>
                                            <h5 class="mb-3">Giá phòng: 2.000.000 đ</h5>
                                            <div type="button"
                                                class="btn btn-danger btn-rounded btn-fw mb-4">Chưa cho thuê
                                            </div>
                                        </div>
                                        <div class=" d-flex justify-content-center">
                                            <a href="#" type="button"
                                                class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
