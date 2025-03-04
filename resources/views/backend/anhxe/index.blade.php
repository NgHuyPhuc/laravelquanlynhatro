@extends('backend/master/master')
@section('title', 'Thêm mới nhà trọ')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                {{-- {!! generateMenuNguoiThue($nhatro, $phong, $check) !!} --}}
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body ">
                                        <h4 class="card-title">Chức năng</h4>
                                        <a href="{{ route('ngthue.themxe', ['id' => $nhatro->id, 'id_nguoithue' => $ngthue->id]) }}"
                                            type="button" class="btn btn-success mb-4">Thêm mới Ảnh xe
                                        </a>
                                        <a href="{{ route('phongtro.themphong', ['id' => $nhatro->id]) }}" type="button"
                                            class="btn btn-success mb-4">Thêm mới Phòng
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
                        <h4 class="card-title">Thông tin xe của {{ $ngthue->gioi_tinh ? 'Chị' : 'Anh' }} {{ $ngthue->ten }}
                        </h4>
                        @if ($anhxe->count() == 0)
                            <h2 style="font-family: 'Times New Roman', Times, serif">Người này không có ảnh xe</h2>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Tên
                                            </th>
                                            <th>
                                                Ảnh
                                            </th>
                                            <th>
                                                Chức năng
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- @dd($anhxe) --}}
                                        @foreach ($anhxe as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->id }}
                                                </td>
                                                <td>
                                                    {{ $ngthue->ten }}
                                                </td>
                                                <td>
                                                    <img style="border-radius: 0%; width: 250px; height: 150px"
                                                        src="/uploads/img/Anhxe/{{ $item->anh_xe }}" alt="image" />
                                                </td>
                                                <td>
                                                    <a href="{{ route('ngthue.suaxe.get', ['id' => $nhatro->id, 'id_nguoithue' => $ngthue->id, 'id_xe' => $item->id]) }}"
                                                        class="btn btn-warning ml-3" style="color: white;">Chỉnh sửa</a>
                                                    {{-- <a href="{{ route('ngthue.xoaxe', ['id' => $nhatro->id, 'id_nguoithue' => $ngthue->id , 'id_xe' => $item->id]) }}"
                                                            class="btn btn-danger ml-3" style="color: white;">Xóa</a> --}}
                                                    <button type="button" class="btn btn-danger ml-3 delete-btn"
                                                        data-toggle="modal" data-target="#deleteModal"
                                                        data-url="{{ route('ngthue.xoaxe', ['id' => $nhatro->id, 'id_nguoithue' => $ngthue->id, 'id_xe' => $item->id]) }}">
                                                        Xóa
                                                    </button>

                                                    <!-- Modal Xác nhận xóa -->
                                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận
                                                                        xóa</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Bạn có chắc chắn muốn xóa ảnh này không?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Hủy</button>
                                                                    <a id="deleteButton" href="#"
                                                                        class="btn btn-danger">Xóa</a>
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
                        @endif
                    </div>
                    {{-- <div class="d-flex justify-content-end align-items-center">
                            <p class="mr-3">Trang: </p>
                            {{ $anhxe->links('backend.pagination.pagination') }}
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Nút kích hoạt modal
                var deleteUrl = button.data('url'); // Lấy URL từ data-url
                var modal = $(this);

                // Cập nhật href của nút Xóa trong modal
                modal.find('#deleteButton').attr('href', deleteUrl);
            });
        });
    </script>
@endsection
