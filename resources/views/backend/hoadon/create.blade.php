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
                                <h4 class="card-title">Danh sách người thuê phòng {{ $phong->ten_phong }}</h4>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form method="GET" class="forms-sample"
                                                action="{{ route('phongtro.hoadon.themhoadontheothang', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}">
                                                <div class="form-group">
                                                    <label for="id_second">Chọn số điện nước Tháng :</label>
                                                    <select style="color: black" name="id_second"
                                                        class="form-control form-control-sm" id="id_second">
                                                        @foreach ($sdn as $item)
                                                            <option style="color: black"
                                                                {{ $item->id == $sdnSecond->id ? 'selected' : '' }}
                                                                value="{{ $item->id }}"> Tháng :
                                                                {{ \Carbon\Carbon::parse($item->date)->format('m/Y') }} , Số
                                                                nước : {{ $item->so_nuoc }}, Số điện :
                                                                {{ $item->so_dien }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_last">Chọn số điện nước Tháng :</label>
                                                    <select style="color: black" name="id_last"
                                                        class="form-control form-control-sm" id="id_last">
                                                        @foreach ($sdn as $item)
                                                            <option style="color: black"
                                                                {{ $item->id == $sdnLast->id ? 'selected' : '' }}
                                                                value="{{ $item->id }}"> Tháng :
                                                                {{ \Carbon\Carbon::parse($item->date)->format('m/Y') }} ,
                                                                Số nước : {{ $item->so_nuoc }}, Số điện :
                                                                {{ $item->so_dien }}</option>
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
                                                    {{ \Carbon\Carbon::parse($sdnSecond->date)->month }}
                                                </td>
                                                <td>
                                                    {{ $sdnSecond->so_dien }}
                                                </td>
                                                <td>
                                                    {{ $sdnSecond->so_nuoc }}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($sdnLast->date)->month }}

                                                </td>
                                                <td>
                                                    {{ $sdnLast->so_dien }}
                                                </td>
                                                <td>
                                                    {{ $sdnLast->so_nuoc }}

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br />
                                    <hr />
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
                                                    Tiền bình nước
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    {{ number_format($cpdv->tien_dien_int) }} VNĐ
                                                </td>
                                                <td>
                                                    {{ number_format($cpdv->tien_nuoc_int) }} VNĐ
                                                </td>
                                                <td>
                                                    {{ number_format($cpdv->tien_mang_int) }} VNĐ
                                                </td>
                                                <td>
                                                    {{ number_format($cpdv->tien_binh_nuoc) }} VNĐ
                                                </td>
                                                <td>
                                                    <img src="/uploads/img/{{ $cpdv->anh_qr_code }}" alt="">
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
                            <form
                                action="{{ route('phongtro.hoadon.storehoadon', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}"
                                method="POST">
                                <div class="container">
                                    <div id='capture' class="invoice"
                                        style="padding: 20px;border: 1px solid #ddd;border-radius: 5px;margin:20px;">
                                        <h2 class="text-center">Hóa Đơn Tiền Phòng {{ $phong->ten_phong }}</h2>
                                        <h3 class="text-center">Tháng
                                            {{ \Carbon\Carbon::parse($sdnLast->date)->format('m') }} năm
                                            {{ \Carbon\Carbon::parse($sdnLast->date)->format('Y') }}</h3>
                                        <div style="display: flex; align-items: center;">
                                            <h4>Kính gửi anh/chị phòng: </h4>
                                            <h1 class="text-danger" style="margin-left: 10%;">{{ $phong->ten_phong }}</h1>
                                        </div>
                                        <br>
                                        <p style="font-size: 20px;"> Xin thông báo tới anh (chị): Phí dịch vụ trong tháng
                                            {{ \Carbon\Carbon::parse($sdnSecond->date)->format('m/Y') }} và tiền thuê phòng
                                            tháng {{ \Carbon\Carbon::parse($sdnLast->date)->format('m/Y') }}. Cụ thể như
                                            sau:</p>
                                        <hr>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="custom-font-size font-weight-bold">STT</th>
                                                            <th class="custom-font-size font-weight-bold">Khoản</th>
                                                            <th class="custom-font-size font-weight-bold text-center">Chi tiết</th>
                                                            <th class="custom-font-size font-weight-bold">Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $stt = 1; // Khởi tạo số thứ tự
                                                        @endphp
                                                        <tr>
                                                            <td class="custom-font-size">{{ $stt++ }}</td>
                                                            <td class="custom-font-size">Tiền Phòng</td>
                                                            <td class="custom-font-size text-center">{{ $phong->ten_phong }} Tháng
                                                                {{ \Carbon\Carbon::parse($sdnLast->date)->format('m') }}
                                                                năm
                                                                {{ \Carbon\Carbon::parse($sdnLast->date)->format('Y') }}
                                                            </td>
                                                            <td class="custom-font-size text-center"><label> {{ number_format($phong->gia_phong) }} 
                                                                </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="custom-font-size">{{ $stt++ }}</td>
                                                            <td class="custom-font-size">Điện</td>
                                                            <td class="custom-font-size text-center"> ( {{ $sdnLast->so_dien }} - {{ $sdnSecond->so_dien }} ) =
                                                                {{ number_format($sdnLast->so_dien - $sdnSecond->so_dien) }}
                                                                kWh
                                                                x {{ number_format($cpdv->tien_dien_int) }} VNĐ/kWh</td>
                                                            <td class="custom-font-size text-center"><label> {{ number_format($tien_dien) }} 
                                                                </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="custom-font-size" class="custom-font-size">{{ $stt++ }}</td>
                                                            <td class="custom-font-size" class="custom-font-size">Nước</td>
                                                            <td class="custom-font-size text-center"> ( {{ $sdnLast->so_nuoc }} - {{ $sdnSecond->so_nuoc }} ) =
                                                                {{ number_format($sdnLast->so_nuoc - $sdnSecond->so_nuoc) }}m³
                                                                x {{ number_format($cpdv->tien_nuoc_int) }} VNĐ/m³</td>
                                                            <td class="custom-font-size text-center"><label> {{ number_format($tien_nuoc) }}
                                                                </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="custom-font-size">{{ $stt++ }}</td>
                                                            <td class="custom-font-size">Internet</td>
                                                            <td class="custom-font-size text-center">{{ $phong->dung_mang == 0 ? '-': $phong->dung_mang }}</td>
                                                            <td class="custom-font-size text-center"><label> {{ $phong->dung_mang == 0 ? '-': number_format($tien_mang) }}</label></td>
                                                        </tr>
                                                        @if ($sdnLast->tien_phat_sinh > 0)
                                                            <tr>
                                                                <td class="custom-font-size">{{ $stt++ }}</td>
                                                                <td class="custom-font-size">Chi phí phát sinh</td>
                                                                <td class="custom-font-size text-center">{{ $sdnLast->chi_phi_phat_sinh }}</td>
                                                                <td class="custom-font-size text-center"><label> {{ number_format($sdnLast->tien_phat_sinh) }}
                                                                        </label></td>
                                                            </tr>
                                                        @endif
                                                        @if ($phong->mua_nuoc != 0)
                                                            <tr>
                                                                <td class="custom-font-size">{{ $stt++ }}</td>
                                                                <td class="custom-font-size">Mua Nước</td>
                                                                <td class="custom-font-size text-center">{{ $phong->mua_nuoc }} x
                                                                    {{ number_format($cpdv->tien_binh_nuoc) }}</td>
                                                                <td class="custom-font-size text-center"><label> {{ number_format($tong_tien_binh_nuoc) }}
                                                                        </label></td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td class="custom-font-size font-weight-bold">
                                                                    {{-- {{ $stt++ }} --}}
                                                                </td>
                                                                <td class="custom-font-size font-weight-bold"></td>
                                                                <td class="custom-font-size font-weight-bold text-center"> Tổng Cộng </td>
                                                                <td class="custom-font-size font-weight-bold text-center"><label> {{ number_format($tong_cong) }} </label>
                                                                </td>
                                                            </tr>
                                                        @endif
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
                                                        <h5 class="text-danger">2. Chuyển khoản</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">Chủ tài khoản: {{ $cpdv->ten_chu_tk }}</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">{{ $cpdv->chi_nhanh }}
                                                        </h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">{{ $cpdv->noi_dung_ck }}</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="qr-code" style=" text-align: center; margin-top: 20px;">
                                                    <img style="width: 350px; height: 350px;"
                                                        src="/uploads/img/{{ $cpdv->anh_qr_code }}"
                                                        alt="QR Code Thanh Toán" />
                                                    <p style="text-align: center;"><strong>Mã QR Code Thanh Toán</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">id_phong_tro </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="id_phong_tro" type="number"
                                            value="{{ $phong->id }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">dung_mang </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="dung_mang" type="number"
                                            value="{{ $phong->dung_mang }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_dien_string </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_dien_string" type="text"
                                            value="( {{ $sdnLast->so_dien }} - {{ $sdnSecond->so_dien }} ) = {{ number_format($sdnLast->so_dien - $sdnSecond->so_dien) }} kWhx {{ number_format($cpdv->tien_dien_int) }} VNĐ/kWh">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_nuoc_string </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_nuoc_string" type="text"
                                            value="( {{ $sdnLast->so_nuoc }} - {{ $sdnSecond->so_nuoc }} ) ={{ number_format($sdnLast->so_nuoc - $sdnSecond->so_nuoc) }}m³ x {{ number_format($cpdv->tien_nuoc_int) }} VNĐ/m³">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">chi_phi_phat_sinh </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="chi_phi_phat_sinh" type="text"
                                            value="{{ $sdnLast->chi_phi_phat_sinh }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_phong_string </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_phong_string" type="text"
                                            value="{{ $phong->ten_phong }} Tháng {{ \Carbon\Carbon::parse($sdnLast->date)->format('m') }} năm {{ \Carbon\Carbon::parse($sdnLast->date)->format('Y') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">thang </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="thang" type="text"
                                            value="Tháng {{ \Carbon\Carbon::parse($sdnLast->date)->format('m') }} năm {{ \Carbon\Carbon::parse($sdnLast->date)->format('Y') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">thong_bao </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="thong_bao" type="text"
                                            value="Xin thông báo tới anh (chị): Phí dịch vụ trong tháng {{ \Carbon\Carbon::parse($sdnSecond->date)->format('m/Y') }} và tiền thuê phòng tháng {{ \Carbon\Carbon::parse($sdnLast->date)->format('m/Y') }}. Cụ thể như sau:">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_binh_nuoc_string </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_binh_nuoc_string" type="text"
                                            value="{{ $phong->mua_nuoc }} x {{ number_format($cpdv->tien_binh_nuoc) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_binh_nuoc_int </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_binh_nuoc_int" type="text"
                                            value="{{ $tong_tien_binh_nuoc }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_phong_int </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_phong_int" type="text"
                                            value="{{ $phong->gia_phong }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_dien_int </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_dien_int" type="number"
                                            value="{{ $tien_dien }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_mang </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_mang" type="number"
                                            value="{{ $phong->dung_mang == 1 ? $cpdv->tien_mang_int : 0 }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_nuoc_int </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_nuoc_int" type="number"
                                            value="{{ $tien_nuoc }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">tien_phat_sinh </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="tien_phat_sinh" type="number"
                                            value="{{ $sdnLast->tien_phat_sinh }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">so_tien_phai_tra </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="so_tien_phai_tra" type="number"
                                            value="{{ $tong_cong }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">so_tien_da_thanh_toan </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="so_tien_da_thanh_toan" type="number"
                                            value="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">so_du </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="so_du" type="number" value="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">trang_thai </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="trang_thai" type="number" value="0">
                                    </div>
                                </div>
                                @csrf
                                <button type="submit" class="btn btn-success float-sm-right">Lưu hóa đơn</button>
                            </form>
                            <button class="btn btn-success" id="capture-btn"
                                data-phong="{{ $phong->ten_phong }} - Tháng {{ \Carbon\Carbon::parse($sdnSecond->date)->format('m-Y') }}">Chụp
                                màn hình</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/html2canvas.js"></script>
    <script>
        // chup man hinh
        var phongName = document.getElementById("capture-btn").getAttribute("data-phong");
        console.log(phongName);
        document.getElementById("capture-btn").onclick = function() {
            html2canvas(document.getElementById("capture")).then(function(canvas) {
                // Chuyển đổi canvas thành hình ảnh
                var img = canvas.toDataURL("image/png");

                // Tạo một liên kết tải về ảnh
                var link = document.createElement("a");
                link.href = img;
                link.download = phongName + ".png";
                link.click();
            }).catch(function(error) {
                console.error("Lỗi khi chụp màn hình:", error);
            });
        };
    </script>
@endsection
