@extends('backend/master/master')
@section('title', 'Thêm mới nhà trọ')
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
                                <h4 class="card-title">Thêm mới người thuê {{$phong->ten_phong}}</h4>
                                <div class="template-demo">
                                    <a href="{{route('phongtro.nguoithue.themnguoi',['id' => $nhatro->id, 'id_phong' => $phong->id])}}" class="btn btn-info">Thêm mới người
                                        thuê phòng</a>
                                    <a href="{{route('phong.nguoithue.danhsach.all',['id' => $nhatro->id, 'id_phong' => $phong->id])}}" class="btn btn-info">Danh sách tất cả người từng thuê</a>
                                    <a href="./taohoadontiennha.html" class="btn btn-success">Tạo hóa đơn tiền phòng</a>
                                    <a href="./xemhoadontiennha.html" class="btn btn-success">Xem hóa đơn tiền phòng</a>
                                    <a href="{{route('phongtro.suaphong.get',['id' => $nhatro->id, 'id_phong' => $phong->id])}}" class="btn btn-danger">Chỉnh sửa thông tin phòng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thêm mới người thuê {{$phong->ten_phong}}</h4>
                    <p class="card-description">
                      Thêm mới người thuê {{$phong->ten_phong}}
                    </p>
                    <form class="forms-sample" method="POST" action="{{route('nguoitro.suanguoi.post',['id' => $id, 'id_phong' => $id_phong, 'id_nguoi_thue' => $nguoithue->id])}}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="name">Tên</label>
                        <input value="{{$nguoithue->ten}}" name="ten" type="text" class="form-control" id="exampleInputName1" placeholder="Tên">
                      </div>
                      <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input value="{{$nguoithue->sdt}}" name="sdt" type="text" class="form-control" id="exampleInputName1" placeholder="Số Điện Thoại">
                      </div>
                      <div class="form-group">
                        <label for="que_quan">Quê quán</label>
                        <input value="{{$nguoithue->que_quan}}" name="que_quan" type="text" class="form-control" id="exampleInputName1" placeholder="Quê Quán">
                      </div>
                      <div class="form-group">
                        <label for="xe">Xe (Có sử dụng xe hay không)</label>
                        <label class="toggle-switch toggle-switch-success ml-3">
                            <input name="xe" type="checkbox" {{$nguoithue->xe == 1 ? 'checked' : ''}}>
                            <span class="toggle-slider round"></span>
                          </label>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Giới tính</label>
                          <select name="gioi_tinh" style="color: black;" class="form-control" id="exampleSelectGender">
                            <option value="0" {{$nguoithue->gioitinh == 0 ? 'selected' : ''}}>Nam</option>
                            <option value="1" {{$nguoithue->gioitinh == 1 ? 'selected' : ''}}>Nữ</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Ảnh CMND mặt trước</label>
                            <input type="file" name="cmnd" class="file-upload-default" id="cmndImage" onchange="updateFileName()" value="{{$nguoithue->cmnd}}">
                            
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" id="fileNameDisplay" disabled placeholder="{{$nguoithue->cmnd}}">
                                
                                <span class="input-group-append">
                                    <label class="file-upload-browse btn btn-primary" for="cmndImage">Chọn ảnh</label>
                                </span>
                            </div>
                        </div>
                        
                      {{-- <div class="form-group">
                        <label>Ảnh cmnd mặt sau</label>
                        <input type="file" name="cmndsau" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div> --}}
                      {{-- @dd($nguoithue->trang_thai == 1 ? 'checked' : '') --}}
                      <div class="form-group">
                        <label for="exampleInputName1">Trạng thái:</label>
                        <label class="toggle-switch toggle-switch-success ml-3">
                            <input name="trang_thai" type="checkbox" {{$nguoithue->trang_thai == 1 ? 'checked' : ''}}>
                            <span class="toggle-slider round"></span>
                          </label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
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
            fileNameDisplay.value = '';  // Xóa nếu không có file
        }
    }
</script>
@endsection