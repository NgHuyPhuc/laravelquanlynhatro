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
                                <h4 class="card-title">Chức năng phòng 301</h4>
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh sách người thuê phòng 301</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              User
                            </th>
                            <th>
                              Tên
                            </th>
                            <th>
                              Số điện thoại
                            </th>
                            <th>
                              Trạng thái
                            </th>
                            <th>
                              Chức năng
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($nguoi as $item)
                            <tr>
                                <td class="py-1">
                                  <img src="/uploads/img/{{$item->cmnd}}" alt="image"/>
                                </td>
                                <td>
                                  {{$item->ten}}
                                </td>
                                <td>
                                  {{$item->sdt}}
                                </td>
                                <td>
                                    @if ($item->trang_thai == 1)
                                    <p class="btn btn-success">Đang thuê</p>
                                    @else
                                    <p style="color: white" class="btn btn-warning">Đã chuyển đi</p>
                                    @endif

                                </td>
                                <td>
                                  <a href="{{route('nguoitro.suanguoi.get',['id' => $nhatro->id , 'id_phong' => $phong->id , 'id_nguoi_thue' => $item->id])}}" class="btn btn-warning" style="color: white;">Chỉnh sửa</a>
                                  <a href="" class="btn btn-danger ml-3">Xóa</a>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>  
                      </table>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <p class="mr-3">Trang:  </p>
                    {{ $nguoi->links('backend.pagination.pagination') }}
                </div>
            </div>
              </div>
        </div>
    </div>
</div>
@endsection