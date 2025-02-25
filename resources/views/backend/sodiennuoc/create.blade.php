@extends('backend/master/master')
@section('title', 'Thêm mới số điện nước')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                {!! generateMenuPhong($nhatro, $phong, $check) !!}
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tạo hóa đơn phòng : {{ $phong->ten_phong }}</h4>
                            <h4 class="card-title">Số điện và số nước tháng trước:</h4>
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
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <br>
                            <h3 class="card-title">Nhập số điện nước {{ $phong->ten_phong }}</h3>
                            <div class="row">
                                <div class="col-lg-8">
                                    <form id="your-form" method="POST" class="forms-sample"
                                        action="{{ route('sodien.nuoc.theophong', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}">
                                        <div class="form-group row">
                                            <label for="so_dien" class="col-sm-3 col-form-label">Nhập số điện :</label>
                                            <div class="col-sm-9">
                                                <input name="so_dien" type="number" class="form-control"
                                                    id="so_dien" 
                                                    min="{{$sdnSecond->so_dien}}"
                                                     placeholder="Nhập số điện Tháng {{$month}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="so_nuoc" class="col-sm-3 col-form-label">Nhập số nước :</label>
                                            <div class="col-sm-9">
                                                <input name="so_nuoc" type="number" class="form-control"
                                                    id="so_nuoc"  
                                                    min="{{$sdnSecond->so_nuoc}}"
                                                     placeholder="Nhập số nước Tháng {{$month}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date" class="col-sm-3 col-form-label">Tháng :</label>
                                            <div class="col-sm-9">
                                                <input name="date" type="date" class="form-control"
                                                    id="date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="chi_phi_phat_sinh" class="col-sm-3 col-form-label">Thông tin chi
                                                phí thêm (nếu có - Nhập chữ) :</label>
                                            <div class="col-sm-9">
                                                <input name="chi_phi_phat_sinh" type="text" class="form-control"
                                                    id="chi_phi_phat_sinh" placeholder="Thông tin chi phí thêm (nếu có - Nhập chữ)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tien_phat_sinh" class="col-sm-3 col-form-label">Chi phí thêm
                                                (nếu có - Nhập số) :</label>
                                            <div class="col-sm-9">
                                                <input name="tien_phat_sinh" type="number" class="form-control"
                                                    id="tien_phat_sinh" placeholder="Chi phí thêm (nếu có - Nhập số)">
                                            </div>
                                        </div>
                                        @if ($checksdn)
                                            <button type="button" id="openModalButton" class="btn btn-danger">Xác
                                                nhận</button>
                                        @else
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        @endif

                                        <button class="btn btn-light">Cancel</button>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <!-- Modal xác nhận -->
                            <div class="modal fade" id="confirmationModal" tabindex="-1"
                                aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmationModalLabel">Xác nhận hành động</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn thực hiện hành động này không? Hành động này sẽ không thể
                                            hoàn tác.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal" id="CancelButton">Hủy</button>
                                            <button type="button" class="btn btn-danger" id="confirmButton">Đúng, thực
                                                hiện</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        document.getElementById('CancelButton').addEventListener('click', function() {
            new bootstrap.Modal(document.getElementById('confirmationModal')).hide();
        });
        // Khi người dùng nhấn vào nút "Đúng, thực hiện"
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Gửi form
            document.getElementById('your-form').submit();
        });
    </script>
@endsection
