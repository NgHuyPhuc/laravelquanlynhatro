@extends('backend/master/master')
@section('title', 'Thêm mới tầng nhà trọ')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="row">
                    <h4 class="card-title">Quản lý tầng nhà cho thuê</h4>
                    {!! generateMenuTang($nhatro) !!}
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
                                                    <td>
                                                        {{ $item->ten_tang_so }}
                                                    </td>
                                                    <td>
                                                        {{ $item->ten_tang }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="{{ route('nhatro.suatang.get', ['id' => $id, 'id_tang' => $item->id]) }}"
                                                                type="button"
                                                                class="btn btn-success btn-sm btn-icon-text mr-3">
                                                                Chỉnh sửa
                                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                                            </a>
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm btn-icon-text"
                                                                data-toggle="modal"
                                                                data-target="#exampleModalLong{{ $item->id }}">
                                                                Xóa
                                                                <i class="typcn typcn-delete-outline btn-icon-append"></i>

                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModalLong{{ $item->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLongTitle{{ $item->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLongTitle{{ $item->id }}}}">
                                                                                Xóa {{ $item->ten_tang }}</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body"
                                                                            style="white-space: normal;;word-wrap: break-word;">
                                                                            <p>Hành động này sẽ xóa tất cả dữ liệu của tầng
                                                                                này bao gồm Phòng trọ, Số điện nước, Hóa
                                                                                đơn, Người từng thuê tại các phòng. Hành
                                                                                động này sẽ không thể hoàn tác hãy chắc chắn
                                                                                khi thực hiện</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <a href="{{ route('nhatro.xoatang', ['id' => $id, 'id_tang' => $item->id]) }}"
                                                                                class="btn btn-danger">
                                                                                Xóa
                                                                                <i
                                                                                    class="typcn typcn-delete-outline btn-icon-append"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
