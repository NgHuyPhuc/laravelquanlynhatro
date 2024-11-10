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
                                <h4 class="card-title">Chức năng phòng 301</h4>
                                <div class="template-demo">
                                    @if ($check == 1)
                                        <a href="{{route('nhatro.storechiphi', ['id' => $nhatro->id])}}" class="btn btn-success">Tạo mới chi phí dịch vụ</a>
                                    @else
                                        <a href="./taohoadontiennha.html" class="btn btn-success">Tạo mới chi phí dịch vụ</a>
                                    @endif
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
                        @if ($check == 0)
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>
                                  Ảnh QR Code
                                </th>
                                <th>
                                  Tên nhà trọ
                                </th>
                                <th>
                                  Tiền điện / 1kwh
                                </th>
                                <th>
                                  Tiền nước / 1m3
                                </th>
                                <th>
                                  Tiền mạng / 1 tháng
                                </th>
                                <th>
                                  Tiền 1 bình nước
                                </th>
                                <th>
                                  Chức năng
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-1">
                                      <img style="height: 350px; width: 350px; border-radius: 0" src="/uploads/img/{{$chiphi->anh_qr_code ?? ''}}" alt="image"/>
                                    </td>
                                    <td>
                                      {{$chiphi->nhatro->ten}}
                                    </td>
                                    <td>
                                      {{$chiphi->tien_dien_int}}
                                    </td>
                                    <td>
                                      {{$chiphi->tien_nuoc_int}}
                                    </td>
                                    <td>
                                      {{$chiphi->tien_mang_int}}
                                    </td>
                                    <td>
                                      {{$chiphi->tien_binh_nuoc}}
                                    </td>
                                    <td>
                                      <a href="{{route('nhatro.suachiphi.get',['id' => $nhatro->id, 'id_chiphi' => $chiphi->id])}}" class="btn btn-warning" style="color: white;">Chỉnh sửa</a>
                                      <a href="" class="btn btn-danger ml-3">Xóa</a>
                                    </td>
                                  </tr>
                            </tbody>  
                          </table>
                        @else
                            <h3>Chưa có thông tin chi phí nhà trọ {{$nhatro->ten}}</h3>
                        @endif
                      
                    </div>
                </div>
            </div>
              </div>
        </div>
    </div>
</div>
@endsection