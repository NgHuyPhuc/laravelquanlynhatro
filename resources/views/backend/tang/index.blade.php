@extends('backend/master/master')
@section('title', 'Thêm mới tầng nhà trọ')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="row">
                <h4 class="card-title">Quản lý tầng nhà cho thuê</h4>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Chức năng chung</h4>
                            <a href="{{route('nhatro.tang.show',['id' => $nhatro->id]) }}" type="button" class="btn btn-success mb-4">Quản Lý Tầng
                            </a>
                            <a href="{{route('phongtro.themphong',['id' => $nhatro->id])}}" type="button" class="ml-3 btn btn-success mb-4">Thêm mới Phòng
                            </a>
                            <div type="button" class="ml-3 btn btn-info mb-4"> Tìm kiếm
                            </div>
                            <a href="{{route('nhatro.themchiphi',['id' => $nhatro->id])}}" type="button" class="ml-3 btn btn-success mb-4">Chi phí dịch vụ
                            </a>
                            <div class="row">
                              <div class="col">
                                <div class="card">
                                  <div class="card-body ">
                                    <h4 class="card-title">Chức năng</h4>
                                    <a href="{{route('nhatro.themtang',['id' => $id]) }}" type="button" class="btn btn-success mb-4">Thêm mới Tầng
                                    </a>
                                  </div>
                            </div>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Danh sách các tầng</h4>
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>
                                  STT
                                </th>
                                <th>
                                  Tên
                                </th>
                                <th>
                                  Chức năng
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($tang as $index => $item)
                                <tr>
                                    {{-- <td >
                                        {{$index + 1}}
                                    </td> --}}
                                    <td>
                                      {{ $item->ten_tang_so }}
                                    </td>
                                    <td>
                                      {{ $item->ten_tang }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{route('nhatro.suatang.get',['id' => $id, 'id_tang' => $item->id])}}" type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                                              Chỉnh sửa
                                              <i class="typcn typcn-edit btn-icon-append"></i>                          
                                            </a>
                                            <a href="{{route('nhatro.xoatang',['id' => $id,'id_tang' => $item->id])}}" type="button" class="btn btn-danger btn-sm btn-icon-text">
                                              Xóa
                                              <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                                            </a>
                                          </div>
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection