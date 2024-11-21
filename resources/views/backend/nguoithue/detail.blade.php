@extends('backend/master/master')
@section('title', 'Thông tin người thuê')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    {{-- <h4 class="card-title">Thêm mới người thuê phòng 301</h4> --}}
                                    <h4 class="card-title">Thông tin người thuê : {{$nguoi->ten}} - {{ $phong->ten_phong }}</h4>
                                    <div class="template-demo">
                                        <a href="{{ route('phongtro.nguoithue.themnguoi', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}"
                                            class="btn btn-info">Thêm mới người
                                            thuê phòng</a>
                                        <a href="{{ route('phong.nguoithue.danhsach.all', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}"
                                            class="btn btn-info">Danh sách tất cả người từng thuê</a>
                                        <a href="./taohoadontiennha.html" class="btn btn-success">Tạo hóa đơn tiền phòng</a>
                                        <a href="./xemhoadontiennha.html" class="btn btn-success">Xem hóa đơn tiền phòng</a>
                                        <a href="{{ route('phongtro.suaphong.get', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}"
                                            class="btn btn-danger">Chỉnh sửa thông tin phòng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thông tin người thuê : {{$nguoi->ten}} -  {{ $phong->ten_phong }}</h4>
                            <p class="card-description">
                                Thông tin người thuê : {{$nguoi->ten}} -  {{ $phong->ten_phong }}
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tên :</label>
                                <div class="col-sm-9">
                                    <input name="ten" type="text" class="form-control" id="ten"
                                        placeholder="Tên" value="{{$nguoi->ten}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số điện thoại :</label>
                                <div class="col-sm-9">
                                    <input name="sdt" type="text" class="form-control" id="sdt"
                                    placeholder="Số Điện Thoại" value="{{$nguoi->sdt}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Quê quán :</label>
                                <div class="col-sm-9">
                                    <input name="que_quan" type="text" class="form-control" id="exampleInputName1"
                                    placeholder="Quê Quán" value="{{$nguoi->que_quan}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Xe (Có sử dụng xe hay không) :</label>
                                <div class="col-sm-9 ">
                                    <label class="toggle-switch toggle-switch-success mt-3">
                                        <input name="xe" type="checkbox" {{$nguoi->xe == 1 ? 'checked' : ''}} disabled>
                                        <span class="toggle-slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giới tính:</label>
                                <div class="col-sm-9 ">
                                    <label class=" mt-3">
                                        <select name="gioi_tinh" style="color: black;" class="form-control" id="exampleSelectGender" disabled>
                                            <option value="0" {{$nguoi->gioi_tinh == 0 ? 'selected' : ''}}>Nam</option>
                                            <option value="1" {{$nguoi->gioi_tinh == 1 ? 'selected' : ''}}>Nữ</option>
                                          </select>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ảnh CMND mặt trước: </label>
                                <img class="col-sm-9" 
                                src="/uploads/img/{{$nguoi->cmnd_mat_trc}}" alt="">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ảnh CMND mặt sau: </label>
                                <img class="col-sm-9" 
                                src="/uploads/img/{{$nguoi->cmnd_mat_sau}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Trạng thái:</label>
                                <label class="toggle-switch toggle-switch-success ml-3">
                                    <input name="trang_thai" type="checkbox" {{$nguoi->trang_thai == 1 ? 'checked' : ''}}>
                                    <span class="toggle-slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateFileName() {
            const fileInput = document.getElementById('cmndImage');
            const fileNameDisplay = document.getElementById('fileNameDisplay');

            // Hiển thị tên ảnh đã chọn
            if (fileInput.files.length > 0) {
                fileNameDisplay.value = fileInput.files[0].name;
            } else {
                fileNameDisplay.value = ''; // Xóa nếu không có file
            }
        }
    </script>
@endsection
