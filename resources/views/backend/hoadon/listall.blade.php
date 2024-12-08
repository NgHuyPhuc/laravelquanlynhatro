@extends('backend/master/master')
@section('title', 'Danh sách hóa đơn')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="card-body">
                                <h4 class="card-title">Chức năng phòng 301</h4>
                                <div class="template-demo">
                                    <a href="{{route('phongtro.nguoithue.themnguoi',['id' => $nhatro->id, 'id_phong' => $phong->id])}}" class="btn btn-info">Thêm mới người
                                        thuê phòng</a>
                                    <a href="{{route('phong.nguoithue.danhsach.all',['id' => $nhatro->id, 'id_phong' => $phong->id])}}" class="btn btn-info">Danh sách tất cả người từng thuê</a>
                                    <a href="./taohoadontiennha.html" class="btn btn-success">Tạo hóa đơn tiền phòng</a>
                                    <a href="./xemhoadontiennha.html" class="btn btn-success">Xem hóa đơn tiền phòng</a>
                                    <a href="{{route('phongtro.suaphong.get',['id' => $nhatro->id, 'id_phong' => $phong->id])}}" class="btn btn-danger">Chỉnh sửa thông tin phòng</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh sách hóa đơn phòng 301</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              Phòng
                            </th>
                            <th>
                              Tháng
                            </th>
                            <th>
                              Tổng tiền nhà
                            </th>
                            
                            <th>
                              Số dư
                            </th>
                            <th>
                                Trạng thái
                              </th>
                            <th>
                              Chức năng
                            </th>
                          </tr>
                        </thead>
                        @php
                              $total = 0;
                            @endphp
                        <tbody>
                            @foreach ($hoadon as $key => $item)
                            
                            <tr>
                                <td class="">
                                  {{$item->phongtro->ten_phong}}
                                </td>
                                <td>
                                  {{$item->thang}}
                                </td>
                                <td>
                                  {{number_format($item->so_tien_phai_tra)}} VNĐ
                                  <p hidden> {{$total = $total + $item->so_tien_phai_tra}}</p>
                                </td>
                                <td>
                                    @if ($item->so_du < 0)
                                        <p style="color: white" class="btn btn-warning">{{number_format($item->so_du)}} VNĐ</p>
                                    @else                                
                                        <p style="color: white" class="btn btn-success">{{number_format($item->so_du)}} VNĐ</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->trang_thai == 2)
                                    <p class="btn btn-success">Đã thanh toán</p>
                                    @elseif($item->trang_thai == 1)
                                    <p style="color: white" class="btn btn-warning">Chưa thanh toán đủ</p>
                                    @else
                                    <p style="color: white" class="btn btn-warning">Chưa thanh toán</p>

                                    @endif
                                </td>
                                <td>
                                  <a href="{{route('phongtro.hoadon.detailhoadon',['id' => $nhatro->id , 'id_phong' => $item->id_phong_tro , 'id_hoadon' => $item->id])}}" class="btn btn-success" style="color: white;">Xem chi tiết</a>
                                  <a href="{{route('hoadontro.suahoadon.get',['id' => $nhatro->id , 'id_phong' => $item->id_phong_tro , 'id_hoadon' => $item->id])}}" class="btn btn-warning ml-3" style="color: white;">Chỉnh sửa</a>
                                  <a href="" class="btn btn-danger ml-3">Xóa</a>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>  
                      </table>
                    </div>
                </div>
                <h3>Tổng tiền : {{$total}}</h3>
                <div class="d-flex justify-content-end align-items-center">
                    <p class="mr-3">Trang:  </p>
                    {{ $hoadon->links('backend.pagination.pagination') }}
                </div>
            </div>
              </div>
        </div>
    </div>
</div>
@endsection