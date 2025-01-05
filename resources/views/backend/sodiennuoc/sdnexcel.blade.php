@extends('backend/master/master')
@section('title', 'Nhập tất cả số điện nước')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="row">
                    <h4 class="card-title">Quản lý nhà cho thuê: {{ $nhatro->ten }}</h4>
                    <a href="./suatennhatro.html" class=" ml-3"> Sửa tên</a>
                    @if ($checkCpdv == 0)
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Chức năng</h4>
                                    <a href="{{ route('nhatro.themchiphi', ['id' => $nhatro->id]) }}" type="button"
                                        class="ml-3 btn btn-danger mb-4">Yêu cầu thêm mới chi phí dịch vụ
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Chức năng</h4>
                                    <a href="{{ route('nhatro.tang.show', ['id' => $nhatro->id]) }}" type="button"
                                        class="btn btn-success mb-4">Quản Lý Tầng
                                    </a>
                                    <a href="{{ route('phongtro.themphong', ['id' => $nhatro->id]) }}" type="button"
                                        class="ml-3 btn btn-success mb-4">Thêm mới Phòng
                                    </a>
                                    <a href="{{ route('phongtro.themphong', ['id' => $nhatro->id]) }}" type="button"
                                        class="ml-3 btn btn-success mb-4">Nhập số điện nước
                                    </a>
                                    <div type="button" class="ml-3 btn btn-info mb-4"> Tìm kiếm
                                    </div>
                                    @if ($checkCpdv == 1)
                                        <a href="{{ route('nhatro.chiphi.show', ['id' => $nhatro->id]) }}" type="button"
                                            class="ml-3 btn btn-success mb-4">Quản lý chi phí dịch vụ
                                        </a>
                                    @else
                                        <a href="{{ route('nhatro.themchiphi', ['id' => $nhatro->id]) }}" type="button"
                                            class="ml-3 btn btn-success mb-4">Thêm mới chi phí dịch vụ
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    <form class="col-12" action="{{ route('post.ImportSdnExcel', ['id' => $nhatro->id]) }}" method="post" enctype="multipart/form-data" accept=".xlsx, .csv">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-uppercase text-danger"> Chọn file excel</h2>
                                    <a href="">Tải file Excel mẫu</a>
                                    <br>
                                    <div class="form-group row">
                                        {{-- <label for="date" class="col-sm-3 col-form-label">Tháng :</label> --}}
                                        <div class="col-sm-9">
                                            <input name="file" type="file" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2 float-right">Lưu Tất Cả Số Điện Nước</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
