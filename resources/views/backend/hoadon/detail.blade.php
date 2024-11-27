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
                                    <h4 class="card-title">Quản lý hóa đơn phòng {{ $phong->ten_phong }}</h4>
                                    <div class="template-demo">
                                        <a href="{{ route('danh.sach.so.dien.nuoc', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}"
                                            class="btn btn-info"> Danh sách số điện nước</a>
                                        <a href="./themmoinguoithue.html" class="btn btn-info">Nhập số điện nước</a>
                                        <a href="./xemthongtinnguoithue.html" class="btn btn-info">Danh sách hóa đơn
                                            {{ $phong->ten_phong }}</a>
                                        <a href="{{ route('phongtro.hoadon.themhoadon', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}"
                                            class="btn btn-success">Tạo hóa đơn
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
                            <h3 class="card-title">Hóa đơn phòng {{ $phong->ten_phong }}</h3>
                            <form
                                action="{{ route('phongtro.hoadon.storehoadon', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}"
                                method="POST"> 
                                <div class="container">
                                    <div class="invoice"
                                        style="padding: 20px;border: 1px solid #ddd;border-radius: 5px;margin:20px;">
                                        <h2 class="text-center">Hóa Đơn Tiền Phòng {{ $phong->ten_phong }}</h2>
                                        <h3 class="text-center">{{$hoadon->thang}}</h3>
                                        <div style="display: flex; align-items: center;">
                                            <h4>Kính gửi anh/chị phòng: </h4>
                                            <h1 class="text-danger" style="margin-left: 10%;">{{ $phong->ten_phong }}</h1>
                                        </div>
                                        <br>
                                        <p style="font-size: 20px;"> {{$hoadon->thong_bao}}</p>
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
                                                            <td>Tiền Phòng</td>
                                                            <td>{{$hoadon->tien_phong_string}}</td>
                                                            <td><label> {{ number_format($hoadon->tien_phong_int) }} VND
                                                                </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Điện</td>
                                                            <td> {{$hoadon->tien_dien_string}}</td>
                                                            <td><label> {{ number_format($hoadon->tien_dien_int) }} VNĐ
                                                                </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Nước</td>
                                                            <td> {{$hoadon->tien_nuoc_string}}</td>
                                                            <td><label> {{ number_format($hoadon->tien_nuoc_int) }} VNĐ
                                                                </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Internet</td>
                                                            <td>{{ $hoadon->dung_mang }}</td>
                                                            <td><label> {{ number_format($hoadon->tien_mang) }} VNĐ</label></td>
                                                        </tr>
                                                        @if ($hoadon->tien_binh_nuoc_int > 0)
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Mua Nước</td>
                                                                <td>{{ $hoadon->tien_binh_nuoc_string }}</td>
                                                                <td><label> {{ number_format($hoadon->tien_binh_nuoc_int) }} VNĐ</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td></td>
                                                                <td> Tổng Cộng </td>
                                                                <td><label> {{ number_format($hoadon->so_tien_phai_tra) }} VNĐ </label></td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>5</td>
                                                                <td></td>
                                                                <td> Tổng Cộng </td>
                                                                <td><label> {{ number_format($hoadon->so_tien_phai_tra) }} VNĐ </label></td>
                                                            </tr>
                                                        @endif
                                                        {{-- <tr>
                                                            <td>5</td>
                                                            <td></td>
                                                            <td> Tổng Cộng </td>
                                                            <td><label> {{ number_format($hoadon->so_tien_phai_tra) }} VNĐ </label></td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                                <!-- </div> -->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3 class="text-danger">Phương Thức Thanh Toán</h3>
                                                <ul style="list-style: none;">
                                                    <li>
                                                        <h5 class="text-danger">1. Tiền mặt</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">2. Chuyển khoản ngân hàng</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">Chủ tài khoản: {{$cpdv->ten_chu_tk}}</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">{{$cpdv->chi_nhanh}}
                                                        </h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">{{$cpdv->noi_dung_ck}}</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="qr-code" style=" text-align: center; margin-top: 20px;">
                                                    <img style="width: 350px; height: 350px;" src="/uploads/img/{{ $cpdv->anh_qr_code }}"
                                                        alt="QR Code Thanh Toán" />
                                                    <p style="text-align: center;"><strong>Mã QR Code Thanh Toán</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-sm-right">Lưu hóa đơn</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
