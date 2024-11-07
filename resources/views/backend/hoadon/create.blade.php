@extends('backend/master/master')
@section('title', 'Tạo mới hóa đơn')
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
                        <h4 class="card-title">Tạo hóa đơn phòng 301</h4>
                        <div class="row">
                            <div class="col-lg-8">
                                <form class="forms-sample">
                            <div class="form-group row">
                              <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nhập số điện Tháng 10:</label>
                              <div class="col-sm-9">
                                <input name="sodien" type="text" class="form-control" id="exampleInputUsername2" placeholder="Nhập số điện Tháng 10">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nhập số nước Tháng 10:</label>
                              <div class="col-sm-9">
                                <input name="sonuoc" type="email" class="form-control" id="exampleInputEmail2" placeholder="Nhập số nước Tháng 10">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputMobile" class="col-sm-3 col-form-label">Thông tin chi phí thêm (nếu có) :</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" placeholder="Thông tin chi phí thêm (nếu có)">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputMobile" class="col-sm-3 col-form-label">Chi phí thêm (nếu có) :</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" placeholder="Chi phí thêm (nếu có)">
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                          </form>
                            </div>
                        </div>
                        
                        <div class="container">
                            <div class="invoice"
                                style="padding: 20px;border: 1px solid #ddd;border-radius: 5px;margin:20px;">
                                <h2 class="text-center">Hóa Đơn Tiền Phòng 301</h2>
                                <h3 class="text-center">Tháng 10 năm 2024</h3>
                                <div style="display: flex; align-items: center;">
                                    <h4 >Kính gửi anh/chị phòng: </h4> <h1 class="text-danger" style="margin-left: 18%;">301</h1>
                                </div>
                                <br>
                                <p style="font-size: 20px;"> Xin thông báo tới anh (chị):  Phí dịch vụ trong tháng 9/2024 và tiền thuê phòng tháng 10/2024. Cụ thể như sau:</p>
                                <hr>
                                <!-- <div class="card"> -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Khoản</th>
                                                    <th>Chi tiết</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Phòng</td>
                                                    <td> Tháng 10 năm 2024</td>
                                                    <td><label> 1.500.000
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Điện</td>
                                                    <td> ( 10477 - 10400 ) = 77kWh x 3.500 VNĐ/kWh</td>
                                                    <td><label> 269.500
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Nước</td>
                                                    <td> ( 1109 - 1102 ) = 7m³ x 27.000 VNĐ/m³</td>
                                                    <td><label> 189.000 VNĐ
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Internet</td>
                                                    <td>1</td>
                                                    <td><label> 50.000 VNĐ</label></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td></td>
                                                    <td> Tổng Cộng </td>
                                                    <td><label> 2.008.500 VNĐ </label></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- </div> -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-7">
                                        <h3 class="text-danger">Phương Thức Thanh Toán</h3>
                                        <ul style="list-style: none;">
                                            <li><h5 class="text-danger">1. Tiền mặt</h5></li>
                                            <li><h5 class="text-danger">2. Chuyển khoản ngân hàng</h5></li>
                                            <li><h5 class="text-danger">Chủ tài khoản: Nguyễn Minh Hằng</h5></li>
                                            <li><h5 class="text-danger">STK: 01753829801-NH TMCP Tiên Phong (CN Hà Nội)</h5></li>
                                            <li><h5 class="text-danger">Nội dung: Phòng… TT theo TB…/20…</h5></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="qr-code" style=" text-align: center; margin-top: 20px;">
                                            <img src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.15752-9/462544095_583779333997068_3164505815730183767_n.png?_nc_cat=111&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeFhUadD46T9U6zTA26FrgUqWdQqnjYozUBZ1CqeNijNQAdAUCXSQOtD458gzg-sBw47gE6Cvye1x89DkuLSsd4e&_nc_ohc=EE_GLkqrAS4Q7kNvgFDoXtU&_nc_zt=23&_nc_ht=scontent.fhan2-3.fna&_nc_gid=AmJjLe-bEvgKkohkXMIpYBK&oh=03_Q7cD1QEBkcHQj3wsIUussFdMIijWVhl10hMWvXK6M6UYDEHhCg&oe=67489B09"
                                                alt="QR Code Thanh Toán" />
                                            <p style="text-align: center;"><strong>Mã QR Code Thanh Toán</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="./chinhsuathongtinphong.html" class="btn btn-success float-sm-right">Lưu hóa đơn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection