@extends('backend/master/master')
@section('title', 'Chỉnh sửa phòng trọ')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h4 class="card-title">{{$phongtro->ten_phong}}</h4>
                                <div class="template-demo">
                                    <a href="./themmoinguoithue.html" class="btn btn-info">Thêm mới người
                                        thuê phòng</a>
                                    <a href="./xemthongtinnguoithue.html" class="btn btn-info">Xem thông tin người thuê phòng</a>
                                    <a href="./taohoadontiennha.html" class="btn btn-success">Tạo hóa đơn tiền phòng</a>
                                    <a href="./xemhoadontiennha.html" class="btn btn-success">Xem hóa đơn tiền phòng</a>
                                    <a href="./chinhsuathongtinphong.html" class="btn btn-danger">Chỉnh sửa thông tin phòng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h4 class="card-title">Chỉnh sửa thông tin {{$phongtro->ten_phong}}</h4>
                                <form method="POST" action="{{route('phongtro.suaphong.post',['id' => $id , 'id_phong' => $phongtro->id])}}" class="forms-sample" enctype="multipart/form-data">
                                  @csrf
                                    <div class="form-group">
                                    <label for="exampleInputName1">Tên phòng</label>
                                    <input name="ten_phong" type="text" class="form-control" id="exampleInputName1" placeholder="Giá phòng" value="{{$phongtro->ten_phong}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlSelect3">Chọn tầng</label>
                                    <select style="color: black" name="id_tang" class="form-control form-control-sm"
                                        id="exampleFormControlSelect3">
                                        @foreach ($tang as $item)
                                            <option value="{{$item->id}}" {{$item->id == $phongtro->id_tang ? 'selected' : ''}}>{{$item->ten_tang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputName1">Giá phòng</label>
                                    <input name="gia_phong" type="text" class="form-control" id="exampleInputName1" placeholder="Giá phòng" value="{{$phongtro->gia_phong}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail3">Dùng mạng:</label>
                                    <label class="toggle-switch toggle-switch-success">
                                        <input name="dung_mang" type="checkbox" value="{{$phongtro->dung_mang}}" {{$phongtro->dung_mang == 1 ? 'checked' : ''}} >
                                        <span class="toggle-slider round"></span>
                                      </label> 
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword4">Cho thuê</label>
                                    <label class="toggle-switch toggle-switch-success">
                                        <input name="trang_thai" type="checkbox" value="{{$phongtro->trang_thai}}" {{$phongtro->trang_thai == 1 ? 'checked' : ''}}>
                                        <span class="toggle-slider round"></span>
                                      </label> 
                                  </div>
                                  <div class="form-group">
                                    <label>Ảnh hợp đồng</label>
                                    <input type="file" name="anh_hop_dong" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleTextarea1">Mô tả</label>
                                    <textarea name="mo_ta" class="form-control" id="exampleTextarea1" rows="4"></textarea>
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
    </div>
</div>
@endsection