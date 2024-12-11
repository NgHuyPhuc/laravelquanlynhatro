@extends('backend/master/master')
@section('title', 'Danh sách số điện nước')
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
                    @if (isset($success))
                        <div class="alert alert-danger">{{ $success }}</div>
                    @endif
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="get">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label">Tháng :</label>
                                        <div class="col-sm-9">
                                            {{-- @dd($_GET['month']) --}}
                                            @if (request()->has('month'))
                                                <input name="month" type="month" class="form-control" id="date"
                                                value="{{ \Carbon\Carbon::parse((request()->get('month')))->format('Y-m') }}" required>
                                            @else
                                            <input name="month" type="month" class="form-control" id="date"
                                                value="{{ \Carbon\Carbon::now()->format('Y-m') }}" required>
                                            @endif
                                            {{-- @dd($monthYear) --}}
                                        </div>
                                        <button type="submit" class="btn btn-success">
                                            Tìm kiếm
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @foreach ($thongtin->tangdesc as $item)
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-uppercase text-danger">{{ $item->ten_tang }}</h3>
                                    <div class="row">
                                        @foreach ($item->phongtro as $phong)
                                            <div class="col-md-3 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body d-flex flex-column ">
                                                        <div class="mb-2">
                                                            <h4 class="mb-0 ">{{ $phong->ten_phong }}</h4>
                                                        </div>
                                                        <h5 class="mb-3">Giá phòng:
                                                            {{ number_format($phong->gia_phong) }} đ</h5>
                                                        @if ($phong->trang_thai === 0)
                                                            <div type="button"
                                                                class="btn btn-danger btn-rounded btn-fw mb-4">Chưa cho
                                                                thuê
                                                            </div>
                                                        @else
                                                            <input type="text" name="id_phong[]"
                                                                value="{{ $phong->id }}" hidden>
                                                            <div class="form-group row">
                                                                <label for="so_dien_{{ $phong->id }}"
                                                                    class="col-sm-7 col-form-label">
                                                                    Số điện tháng {{ $month }}
                                                                    :</label>
                                                                {{-- <label for="so_dien_{{ $phong->id }}"
                                                                    class="col-sm-7 col-form-label">
                                                                    Số điện tháng {{ $month }}
                                                                    :</label> --}}
                                                                {{-- <div class="col-sm-5">
                                                                    <input name="so_dien[]" type="number"
                                                                        class="form-control"
                                                                        id="so_dien_{{ $phong->id }}"
                                                                        placeholder="Số điện T {{ $month }}"
                                                                        value="{{$phong->getLastestSdn()->so_dien}}"
                                                                        required>
                                                                </div> --}}
                                                                @if ($phong->getSdnByMonthYear($year, $month)->first()== null)
                                                                    <div class="alert alert-warning">
                                                                        Không có bản ghi nào cho tháng và năm này.
                                                                    </div>
                                                                @else
                                                                    <div class="col-sm-5">
                                                                        <input name="so_dien[]" type="number"
                                                                            class="form-control"
                                                                            id="so_dien_{{ $phong->id }}"
                                                                            placeholder="Số điện T{{ $month }}"
                                                                            value="{{ $phong->getSdnByMonthYear($year, $month)->first()->so_dien }}"
                                                                            required>
                                                                    </div>
                                                                @endif
                                                                {{-- @dd($phong->getLastestSdn()->first()) --}}
                                                            </div>
                                                            <div class="form-group row">
                                                                {{-- <label for="so_nuoc_{{ $phong->id }}"
                                                                    class="col-sm-7 col-form-label">
                                                                    Số nước tháng {{ $month }}
                                                                    :</label>
                                                                <div class="col-sm-5">
                                                                    <input name="so_nuoc[]" type="number"
                                                                        class="form-control"
                                                                        id="so_nuoc_{{ $phong->id }}"
                                                                        placeholder="Số nước T {{ $month }}"
                                                                        value="{{$phong->getLastestSdn()->so_nuoc}}"
                                                                        required>
                                                                </div> --}}
                                                                <label for="so_nuoc_{{ $phong->id }}"
                                                                    class="col-sm-7 col-form-label">
                                                                    Số nước tháng {{ $month }}
                                                                    :</label>
                                                                @if ($phong->getSdnByMonthYear($year, $month)->first() == null)
                                                                    <div class="alert alert-warning">
                                                                        Không có bản ghi nào cho tháng và năm này.
                                                                    </div>
                                                                @else
                                                                    <div class="col-sm-5">
                                                                        <input name="so_nuoc[]" type="number"
                                                                            class="form-control"
                                                                            id="so_nuoc_{{ $phong->id }}"
                                                                            placeholder="Số nước T {{ $month }}"
                                                                            value="{{ $phong->getSdnByMonthYear($year, $month)->first()->so_nuoc }}"
                                                                            required>
                                                                    </div>
                                                                    
                                                                @endif

                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class=" d-flex justify-content-center">
                                                        <a href="{{ route('nhatro.phong.show.info', ['id' => $thongtin->id, 'id_phong' => $phong->id]) }}"
                                                            type="button"
                                                            class="btn btn-outline-info btn-fw justify-content-center mb-4">Xem
                                                            thêm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <footer class="footer">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright
                                    © 2020 <a href="https://www.bootstrapdash.com/" class="text-muted"
                                        target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">Free
                                    <a href="https://www.bootstrapdash.com/" class="text-muted" target="_blank">Bootstrap
                                        dashboard</a> templates from
                                    Bootstrapdash.com</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
