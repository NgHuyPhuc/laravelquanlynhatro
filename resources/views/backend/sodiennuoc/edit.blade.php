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
                                        <a href="{{ route('phongtro.hoadon.themhoadon', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}" class="btn btn-success">Tạo hóa đơn
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
                            <h3 class="card-title">Nhập số điện nước {{ $phong->ten_phong }}</h3>
                            <div class="row">
                                <div class="col-lg-8">
                                    <form id="your-form" method="POST" class="forms-sample"
                                        action="{{ route('sodien.nuoc.theophong.update', ['id' => $nhatro->id, 'id_phong' => $phong->id, 'id_sdn' => $sdn->id]) }}">
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nhập số điện :</label>
                                            <div class="col-sm-9">
                                                <input name="so_dien" type="number" class="form-control"
                                                    id="exampleInputUsername2" placeholder="Nhập số điện Tháng 10" value="{{$sdn->so_dien}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nhập số nước :</label>
                                            <div class="col-sm-9">
                                                <input name="so_nuoc" type="number" class="form-control"
                                                    id="exampleInputEmail2" placeholder="Nhập số nước Tháng 10" value="{{$sdn->so_nuoc}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tháng này :</label>
                                            <div class="col-sm-9">
                                                <input name="date" type="date" class="form-control"
                                                    id="exampleInputEmail2" value="{{\Carbon\Carbon::parse($sdn->date)->format('Y-m-d')}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Thông tin chi
                                                phí thêm (nếu có) :</label>
                                            <div class="col-sm-9">
                                                <input name="chi_phi_phat_sinh" type="text" class="form-control"
                                                    id="exampleInputMobile" placeholder="Thông tin chi phí thêm (nếu có)" value="{{$sdn->chi_phi_phat_sinh}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Chi phí thêm
                                                (nếu có) :</label>
                                            <div class="col-sm-9">
                                                <input name="tien_phat_sinh" type="number" class="form-control"
                                                    id="exampleInputMobile" placeholder="Chi phí thêm (nếu có)" value="{{$sdn->tien_phat_sinh}}">
                                            </div>
                                        </div>
                                        {{-- @if ($checksdn)
                                            <button type="button" id="openModalButton" class="btn btn-danger">Xác
                                                nhận</button>
                                        @else
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        @endif --}}
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
                                                data-bs-dismiss="modal">Hủy</button>
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
