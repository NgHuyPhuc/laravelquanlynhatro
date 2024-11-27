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
                            <h4 class="card-title">Tạo hóa đơn phòng {{ $phong->ten_phong }}</h4>
                            <div class="card-body">
                                <h4 class="card-title">Danh sách người thuê phòng 301</h4>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form method="GET" class="forms-sample"
                                                action="{{ route('phongtro.hoadon.themhoadontheothang', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}">
                                                <div class="form-group">
                                                <label for="exampleFormControlSelect3">Chọn tầng . /</label>
                                                <a href="{{route('nhatro.themtang',['id'=> $nhatro->id])}}">Thêm mới tầng</a>
                                                <select style="color: black" name="id_second" class="form-control form-control-sm"
                                                    id="exampleFormControlSelect3">
                                                    @foreach ($sdn as $item)
                                                        <option style="color: black" {{$item->id == $sdnSecond->id ? 'selected' : ''}} value="{{$item->id}}"> Tháng : {{\Carbon\Carbon::parse($item->date)->format('m/Y')}} , Số nước : {{$item->so_nuoc}}, Số điện : {{$item->so_dien}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect3">Chọn tầng . /</label>
                                                    <a href="{{route('nhatro.themtang',['id'=> $nhatro->id])}}">Thêm mới tầng</a>
                                                    <select style="color: black" name="id_last" class="form-control form-control-sm"
                                                        id="exampleFormControlSelect3">
                                                        @foreach ($sdn as $item)
                                                            <option style="color: black" {{$item->id == $sdnLast->id ? 'selected' : ''}} value="{{$item->id}}"> Tháng : {{\Carbon\Carbon::parse($item->date)->format('m/Y')}} , Số nước : {{$item->so_nuoc}}, Số điện : {{$item->so_dien}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button class="btn btn-light">Cancel</button>
                                                {{-- @csrf --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Tháng
                                                </th>
                                                <th>
                                                    Số điện
                                                </th>
                                                <th>
                                                    Số nước
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{\Carbon\Carbon::parse($sdnSecond->date)->month}}
                                                </td>
                                                <td>
                                                    {{$sdnSecond->so_dien}}
                                                </td>
                                                <td>
                                                    {{$sdnSecond->so_nuoc}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{\Carbon\Carbon::parse($sdnLast->date)->month}}

                                                </td>
                                                <td>
                                                    {{$sdnLast->so_dien}}
                                                </td>
                                                <td>
                                                    {{$sdnLast->so_nuoc}}

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br/>
                                    <hr/>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    STT
                                                </th>
                                                <th>
                                                    Tiền điện / 1 số
                                                </th>
                                                <th>
                                                    Tiền nước / 1m3
                                                </th>
                                                <th>
                                                    Tiền mạng / 1 tháng
                                                </th>
                                                <th>
                                                    tien_binh_nuoc
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    {{$cpdv->tien_dien_int}}
                                                </td>
                                                <td>
                                                    {{$cpdv->tien_nuoc_int}}
                                                </td>
                                                <td>
                                                    {{$cpdv->tien_mang_int}}
                                                </td>
                                                <td>
                                                    {{$cpdv->tien_binh_nuoc}}
                                                </td>
                                                <td>
                                                    <img src="/uploads/img/{{$cpdv->anh_qr_code}}" alt="">
                                                </td>

                                                <td>
                                                    <a href="http://localhost:8000/nhatro/1/phong/2/nguoithue/suanguoithue/3"
                                                        class="btn btn-warning" style="color: white;">Chỉnh sửa</a>
                                                    <a href="" class="btn btn-danger ml-3">Xóa</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="container">
                                <div class="invoice"
                                    style="padding: 20px;border: 1px solid #ddd;border-radius: 5px;margin:20px;">
                                    <h2 class="text-center">Hóa Đơn Tiền Phòng 301</h2>
                                    <h3 class="text-center">Tháng 10 năm 2024</h3>
                                    <div style="display: flex; align-items: center;">
                                        <h4>Kính gửi anh/chị phòng: </h4>
                                        <h1 class="text-danger" style="margin-left: 18%;">301</h1>
                                    </div>
                                    <br>
                                    <p style="font-size: 20px;"> Xin thông báo tới anh (chị): Phí dịch vụ trong tháng
                                        9/2024 và tiền thuê phòng tháng 10/2024. Cụ thể như sau:</p>
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
                                                        <td><label> {{ number_format($phong->gia_phong) }} VND
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Điện</td>
                                                        <td> ( {{ $sdnLast->so_dien }} - {{ $sdnSecond->so_dien }} ) =
                                                            {{ number_format($sdnLast->so_dien - $sdnSecond->so_dien) }} kWh
                                                            x {{ number_format($cpdv->tien_dien_int) }} VNĐ/kWh</td>
                                                        <td><label> {{ number_format($tien_dien) }} VNĐ
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Nước</td>
                                                        <td> ( {{ $sdnLast->so_nuoc }} - {{ $sdnSecond->so_nuoc }} ) =
                                                            {{ number_format($sdnLast->so_nuoc - $sdnSecond->so_nuoc) }}m³
                                                            x {{ number_format($cpdv->tien_nuoc_int) }} VNĐ/m³</td>
                                                        <td><label> {{ number_format($tien_nuoc) }} VNĐ
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Internet</td>
                                                        <td>{{ $phong->dung_mang }}</td>
                                                        <td><label> {{ number_format($tien_mang) }} VNĐ</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td></td>
                                                        <td> Tổng Cộng </td>
                                                        <td><label> {{ number_format($tong_cong) }} VNĐ </label></td>
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
                                                <li>
                                                    <h5 class="text-danger">1. Tiền mặt</h5>
                                                </li>
                                                <li>
                                                    <h5 class="text-danger">2. Chuyển khoản ngân hàng</h5>
                                                </li>
                                                <li>
                                                    <h5 class="text-danger">Chủ tài khoản: Nguyễn Minh Hằng</h5>
                                                </li>
                                                <li>
                                                    <h5 class="text-danger">STK: 01753829801-NH TMCP Tiên Phong (CN Hà Nội)
                                                    </h5>
                                                </li>
                                                <li>
                                                    <h5 class="text-danger">Nội dung: Phòng… TT theo TB…/20…</h5>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="qr-code" style=" text-align: center; margin-top: 20px;">
                                                <img style="width: 350px; height: 350px;" src="/uploads/img/{{$cpdv->anh_qr_code}}"
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
