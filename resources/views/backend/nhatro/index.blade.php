@extends('backend/master/master')
@section('title', 'Nhà trọ')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="row">
                    <h4 class="card-title">Quản lý nhà cho thuê: {{ $nhatro->ten }}</h4>
                    <a href="./suatennhatro.html" class=" ml-3"> Sửa tên</a>
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
                                    <a href="{{ route('phongtro.themphong', ['id' => $nhatro->id]) }}" type="button"
                                        class="ml-3 btn btn-success mb-4">Nhập số điện nước
                                    </a>
                                    <div type="button" class="ml-3 btn btn-info mb-4"> Tìm kiếm
                                    </div>
                                    @if ($checkCpdv == 1)
                                        <a href="{{ route('nhatro.chiphi.show', ['id' => $nhatro->id]) }}" type="button"
                                            class="ml-3 btn btn-success mb-4">Quản lý chi phí dịch vụ
                                        </a>
                                    @else
                                        <a href="{{ route('nhatro.themchiphi', ['id' => $nhatro->id]) }}" type="button"
                                            class="ml-3 btn btn-success mb-4">Thêm mới chi phí dịch vụ
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- foreach o day --}}
                    @foreach ($thongtin->tangdesc as $item)
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-uppercase text-danger">{{ $item->ten_tang }}</h3>
                                    <div class="row">
                                        @foreach ($item->phongtro as $phong)
                                            <div class="col-md-3 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body d-flex flex-column ">
                                                        <div class="mb-2">
                                                            <h4 class="mb-0 ">{{ $phong->ten_phong }}</h4>
                                                        </div>
                                                        <h6 class="mb-3">Giá phòng: {{ number_format($phong->gia_phong) }}
                                                            đ</h6>
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
                                                                {{ $phong->so_du >= 0 ? 'Số dư' : 'Còn thiếu' }}
                                                                {{ $phong->so_du }} VNĐ
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <button class="buy-water" data-nhatro-id="{{ $nhatro->id }}"
                                                        data-id="{{ $phong->id }}">+ Nuoc</button>
                                                    <a href="javascript:void(0)">{{ $phong->mua_nuoc }}</a>
                                                    <button class="tru-water" data-nhatro-id="{{ $nhatro->id }}"
                                                        data-id="{{ $phong->id }}">- Nuoc</button>

                                                    <div class=" d-flex justify-content-center">
                                                        <a href="{{ route('nhatro.phong.show.info', ['id' => $thongtin->id, 'id_phong' => $phong->id]) }}"
                                                            type="button"
                                                            class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                            thêm</a>
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
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright
                                    © 2020 <a href="https://www.bootstrapdash.com/" class="text-muted"
                                        target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Free
                                    <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrap
                                        dashboard</a> templates from
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
    {{-- /nhatro/id/phong/id_phong/muanuoc
            /nhatro/id/phong/id_phong/trunuoc --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tất cả các nút với class 'buy-water'
            const buttons = document.querySelectorAll('.buy-water');

            // Duyệt qua từng nút và gắn sự kiện click
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const idPhong = this.getAttribute('data-id'); // Lấy id của phòng
                    const nhatroId = this.getAttribute('data-nhatro-id'); // Lấy id của nhà trọ

                    console.log("idPhong:", idPhong); // Kiểm tra giá trị trong console
                    console.log("nhatroId:", nhatroId); // Kiểm tra giá trị trong console

                    // Lấy CSRF token từ meta tag trong HTML
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content');

                    // Gửi yêu cầu POST đến backend để mua nước
                    fetch(`/nhatro/${nhatroId}/phong/${idPhong}/muanuoc`, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                // 'X-CSRF-TOKEN': csrfToken // Thêm token CSRF vào header
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Mua bình nước thành công!') {
                                alert('Mua bình nước thành công! Số lần mua: ' + data.mua_nuoc);
                            } else {
                                alert(data.message); // Hiển thị lỗi nếu không thành công
                            }
                        })
                        .catch(error => {
                            console.error('Có lỗi xảy ra:', error);
                            alert('Có lỗi xảy ra khi thực hiện hành động.');
                        });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tất cả các nút với class 'buy-water'
            const buttons = document.querySelectorAll('.tru-water');

            // Duyệt qua từng nút và gắn sự kiện click
            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const idPhong = this.getAttribute('data-id'); // Lấy id của phòng
                    const nhatroId = this.getAttribute('data-nhatro-id'); // Lấy id của nhà trọ

                    console.log("idPhong:", idPhong); // Kiểm tra giá trị trong console
                    console.log("nhatroId:", nhatroId); // Kiểm tra giá trị trong console

                    // Lấy CSRF token từ meta tag trong HTML
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content');

                    // Gửi yêu cầu POST đến backend để mua nước
                    fetch(`/nhatro/${nhatroId}/phong/${idPhong}/trunuoc`, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                // 'X-CSRF-TOKEN': csrfToken // Thêm token CSRF vào header
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Trừ bình nước thành công!') {
                                alert('Trừ bình nước thành công! Số lần mua: ' + data.mua_nuoc);
                            } else {
                                alert(data.message); // Hiển thị lỗi nếu không thành công
                            }
                        })
                        .catch(error => {
                            console.error('Có lỗi xảy ra:', error);
                            alert('Có lỗi xảy ra khi thực hiện hành động.');
                        });
                });
            });
        });

        // document.getElementById('tru-water').addEventListener('click', function() {
        //     // Lấy id của phòng từ thuộc tính data-id
        //     const idPhong = this.getAttribute('data-id');
        //     const nhatroId = this.getAttribute('data-nhatro-id');
        //     // Gửi yêu cầu POST đến backend để mua nước
        //     // fetch(`/mua-nuoc/${idPhong}`, {
        //     fetch(`/nhatro/${nhatroId}/phong/${idPhong}/trunuoc`, {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 // Nếu cần, bạn có thể thêm token CSRF ở đây
        //                 'X-CSRF-TOKEN': csrf_token
        //             }
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.message === 'Mua nước thành công!') {
        //                 alert('Mua nước thành công! Số lần mua: ' + data.mua_nuoc);
        //             } else {
        //                 alert(data.message); // Hiển thị lỗi nếu không thành công
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Có lỗi xảy ra:', error);
        //             alert('Có lỗi xảy ra khi thực hiện hành động.');
        //         });
        // });
    </script>
@endsection
