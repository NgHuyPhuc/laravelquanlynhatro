@extends('backend/master/master')
@section('title', 'Thêm mới nhà trọ')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            {!! generateMenuNguoiThue($nhatro, $phong, $check) !!}
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh sách người thuê phòng 301</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              Ảnh CMND mặt trước
                            </th>
                            <th>
                              Ảnh CMND mặt sau
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
                                <td>
                                  <img style="border-radius: 0%; width: 250px; height: 150px" src="/uploads/img/{{$item->cmnd_mat_trc}}" alt="image"/>
                                </td>
                                <td>
                                  <img style="border-radius: 0%; width: 250px; height: 150px" src="/uploads/img/{{$item->cmnd_mat_sau}}" alt="image"/>
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
                                  <a href="{{route('nhatro.phong.nguoithue.show.1.info',['id' => $nhatro->id , 'id_phong' => $phong->id , 'id_nguoi_thue' => $item->id])}}" class="btn btn-info ml-3" style="color: white;">Xem thông tin chi tiết</a>
                                  <a href="{{route('nguoitro.suanguoi.get',['id' => $nhatro->id , 'id_phong' => $phong->id , 'id_nguoi_thue' => $item->id])}}" class="btn btn-warning ml-3" style="color: white;">Chỉnh sửa</a>
                                  <a href="" class="btn btn-danger ml-3">Xóa</a>
                                  <br>
                                  @if ($item->xe == 1)
                                  <a href="{{route('nguoitro.suanguoi.get',['id' => $nhatro->id , 'id_phong' => $phong->id , 'id_nguoi_thue' => $item->id])}}" class="btn btn-success ml-3 mt-3" style="color: white;">Thông tin xe</a>
                                  @endif
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