@extends('backend/master/master')
@section('title', 'Số điện nước hiện tại của phòng')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h4 class="card-title">Chức năng phòng {{$phong->ten_phong}}</h4>
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
                        <h4 class="card-title">Tạo hóa đơn phòng {{$phong->ten_phong}}</h4>
                        <div class="row">
                            <div class="col-lg-8">
                                <form method="POST" class="forms-sample" action="{{route('phongtro.hoadon.postsodiennuoc1',['id' => $nhatro->id,'id_phong' => $phong->id])}}" >
                            <div class="form-group row">
                              <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nhập số điện Hiện tại:</label>
                              <div class="col-sm-9">
                                <input required name="so_dien" type="number" class="form-control" id="exampleInputUsername2" placeholder="Nhập số điện Hiện tại">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nhập số nước Hiện tại:</label>
                              <div class="col-sm-9">
                                <input required name="so_nuoc" type="number" class="form-control" id="exampleInputEmail2" placeholder="Nhập số nước Hiện tại">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Chọn tháng:</label>
                              <div class="col-sm-9">
                                <input required name="date" type="date" class="form-control" id="exampleInputEmail2">
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