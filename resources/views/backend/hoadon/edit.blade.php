@extends('backend/master/master')
@section('title', 'Chỉnh sửa hóa đơn')
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
                            aa
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tạo hóa đơn phòng {{ $phong->ten_phong }}</h4>
                            <div class="card-body">
                                <h4 class="card-title">Danh sách người thuê phòng {{ $phong->ten_phong }}</h4>
                            </div>
                            <form
                                action="{{ route('hoadontro.suahoadon.post', ['id' => $nhatro->id, 'id_phong' => $phong->id, 'id_hoadon' => $hoadon->id]) }}"
                                method="POST"> 
                                <div class="container">
                                    <div class="invoice"
                                        style="padding: 20px;border: 1px solid #ddd;border-radius: 5px;margin:20px;">
                                        <h2 class="text-center">Hóa Đơn Tiền Phòng {{ $phong->ten_phong }}</h2>
                                        <h3 class="text-center">
                                            <input type="text" name="thang" value="{{$hoadon->thang}}">
                                        </h3>
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
                                                            <td><input style="width: 400px" type="text" name="tien_phong_string" value="{{$hoadon->tien_phong_string}}"></td>
                                                            <td><label> <input style="width: auto" type="text" name="tien_phong_int" value="{{$hoadon->tien_phong_int}}"> VND
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Điện</td>
                                                            <td><input style="width: 400px" type="text" name="tien_dien_string" value="{{$hoadon->tien_dien_string}}"></td>
                                                            <td><label> <input style="width: auto" type="text" name="tien_dien_int" value="{{$hoadon->tien_dien_int}}"> VND
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Nước</td>
                                                            <td><input style="width: 400px" type="text" name="tien_nuoc_string" value="{{$hoadon->tien_nuoc_string}}"></td>
                                                            <td><label> <input style="width: auto" type="text" name="tien_nuoc_int" value="{{$hoadon->tien_nuoc_int}}"> VND
                                                            </label>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Internet</td>
                                                            <td><input style="width: 400px" type="text" name="dung_mang" value="{{$hoadon->dung_mang}}"></td>
                                                            <td><label> <input style="width: auto" type="text" name="tien_mang" value="{{$hoadon->tien_mang}}"> VND
                                                                </label>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Chi phí phát sinh: </td>
                                                            <td><input style="width: 400px" type="text" name="chi_phi_phat_sinh" value="{{$hoadon->chi_phi_phat_sinh}}"></td>
                                                            <td><label> <input style="width: auto" type="text" name="tien_phat_sinh" value="{{$hoadon->tien_phat_sinh}}"> VND
                                                            </label>
                                                        </td>
                                                        <tr>
                                                            <td>6</td>
                                                            <td></td>
                                                            <td> Tổng Cộng </td>
                                                            <td><label> <input style="width: auto" type="text" name="so_tien_phai_tra" value="{{$hoadon->so_tien_phai_tra}}"> VND
                                                            </label>
                                                        </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                                                    <img src="/uploads/img/{{ $cpdv->anh_qr_code }}"
                                                        alt="QR Code Thanh Toán" />
                                                    <p style="text-align: center;"><strong>Mã QR Code Thanh Toán</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Số tiền đã thanh toán: </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="so_tien_da_thanh_toan" type="number"
                                        value="{{ $hoadon->so_tien_da_thanh_toan }}">
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Số tiền đã thanh toán: </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="so_tien_da_thanh_toan" type="number"
                                        value="{{ $hoadon->so_tien_da_thanh_toan }}">
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label for="trang_thai">Trang thái thanh toán</label>
                                      <select name="trang_thai" style="color: black;" class="form-control" id="trang_thai">
                                        <option value="0" {{$hoadon->trang_thai == 0 ? 'selected' : ''}}>Chưa thanh toán</option>
                                        <option value="1" {{$hoadon->trang_thai == 1 ? 'selected' : ''}}>Chưa thanh toán đủ</option>
                                        <option value="2" {{$hoadon->trang_thai == 2 ? 'selected' : ''}}>Đã thanh toán</option>
                                      </select>
                                    </div>
                                @csrf
                                <button type="submit" class="btn btn-success float-sm-right">Lưu hóa đơn</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Khi nhấn vào nút "Xác nhận"
        document.getElementById('openModalButton').addEventListener('click', function() {
            // Mở modal xác nhận
            new bootstrap.Modal(document.getElementById('confirmationModal')).show();
        });

        // Khi người dùng nhấn vào nút "Đúng, thực hiện"
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Gửi form
            document.getElementById('your-form').submit();
        });
    </script>
@endsection
