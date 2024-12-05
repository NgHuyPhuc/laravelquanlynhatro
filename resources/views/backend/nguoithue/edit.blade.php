@extends('backend/master/master')
@section('title', 'Thêm mới nhà trọ')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            {!! generateMenuNguoiThue($nhatro, $phong, $check) !!}
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
                            <option value="0" {{$nguoithue->gioi_tinh == 0 ? 'selected' : ''}}>Nam</option>
                            <option value="1" {{$nguoithue->gioi_tinh == 1 ? 'selected' : ''}}>Nữ</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Ảnh CMND mặt trước</label>
                            <input type="file" name="cmnd_mat_trc" class="file-upload-default" id="cmnd_mat_trc" onchange="updateFileNametrc()" value="{{$nguoithue->cmnd_mat_trc}}">
                            
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" id="fileNameDisplaytrc" disabled placeholder="{{$nguoithue->cmnd_mat_trc}}">
                                
                                <span class="input-group-append">
                                    <label class="file-upload-browse btn btn-primary" for="cmnd_mat_trc">Chọn ảnh</label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Ảnh CMND mặt sau</label>
                          <input type="file" name="cmnd_mat_sau" class="file-upload-default" id="cmnd_mat_sau" onchange="updateFileNamesau()" value="{{$nguoithue->cmnd_mat_sau}}">
                          
                          <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" id="fileNameDisplaysau" disabled placeholder="{{$nguoithue->cmnd_mat_sau}}">
                              
                              <span class="input-group-append">
                                  <label class="file-upload-browse btn btn-primary" for="cmnd_mat_sau">Chọn ảnh</label>
                              </span>
                          </div>
                      </div>
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
    function updateFileNametrc() {
        const fileInput = document.getElementById('cmnd_mat_trc');
        const fileNameDisplaytrc = document.getElementById('fileNameDisplaytrc');
        
        // Hiển thị tên ảnh đã chọn
        if (fileInput.files.length > 0) {
            fileNameDisplaytrc.value = fileInput.files[0].name;
        } else {
            fileNameDisplaytrc.value = '';  // Xóa nếu không có file
        }
    }
    function updateFileNamesau() {
        const fileInput = document.getElementById('cmnd_mat_sau');
        const fileNameDisplaysau = document.getElementById('fileNameDisplaysau');
        
        // Hiển thị tên ảnh đã chọn
        if (fileInput.files.length > 0) {
            fileNameDisplaysau.value = fileInput.files[0].name;
        } else {
            fileNameDisplaysau.value = '';  // Xóa nếu không có file
        }
    }
</script>
@endsection