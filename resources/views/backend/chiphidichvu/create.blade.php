@extends('backend/master/master')
@section('title', 'Thêm mới chi phí dịch vụ')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h4 class="card-title">Chức năng nhà trọ {{ $nhatro->ten }}</h4>
                                    <div class="template-demo">
                                        <a href="./themmoinguoithue.html" class="btn btn-info">Thêm mới người
                                            thuê phòng</a>
                                        <a href="./xemthongtinnguoithue.html" class="btn btn-info">Xem thông tin
                                            người thuê phòng</a>
                                        <a href="./taohoadontiennha.html" class="btn btn-success">Tạo hóa đơn
                                            tiền phòng</a>
                                        <a href="./xemhoadontiennha.html" class="btn btn-success">Xem hóa đơn
                                            tiền phòng</a>
                                        <a href="./chinhsuathongtinphong.html" class="btn btn-danger">Chỉnh sửa
                                            thông tin phòng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tạo mới chi phí dịch vụ {{ $nhatro->ten }}</h4>
                            <div class="row">
                                <div class="col-lg-8">
                                    <form method="POST" class="forms-sample"
                                        action="{{ route('nhatro.storechiphi', ['id' => $nhatro->id]) }}"
                                        enctype="multipart/form-data">

                                        <input name="id_nha_tro" type="number" class="form-control" id="id_nha_tro"
                                            value="{{ $nhatro->id }}" placeholder="Nhập số điện Tháng 10">
                                        <div class="form-group row">
                                            <label for="tien_dien_int" class="col-sm-3 col-form-label">Tiền điện / 1 kwh
                                                :</label>
                                            <div class="col-sm-9">
                                                <input name="tien_dien_int" type="number" class="form-control"
                                                    id="tien_dien_int" placeholder="Nhập tiền điện / 1kwh">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tien_nuoc_int" class="col-sm-3 col-form-label">Tiền nước / m3
                                                :</label>
                                            <div class="col-sm-9">
                                                <input name="tien_nuoc_int" type="number" class="form-control"
                                                    id="tien_nuoc_int" placeholder="Nhập tiền nước / 1m3">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tien_mang_int" class="col-sm-3 col-form-label">Tiền mạng / 1 Tháng
                                                :</label>
                                            <div class="col-sm-9">
                                                <input name="tien_mang_int" type="number" class="form-control"
                                                    id="tien_mang_int" placeholder="Nhập Tiền mạng / 1 Tháng">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tien_binh_nuoc" class="col-sm-3 col-form-label">Tiền bình nước
                                                :</label>
                                            <div class="col-sm-9">
                                                <input name="tien_binh_nuoc" type="number" class="form-control"
                                                    id="tien_binh_nuoc" placeholder="Nhập Tiền bình nước">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Qr code chuyển
                                                khoản :</label>
                                            <div class="col-sm-9">
                                                <input name="anh_qr_code" type="file" class="form-control"
                                                    id="exampleInputMobile">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
