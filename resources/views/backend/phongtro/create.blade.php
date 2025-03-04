@extends('backend/master/master')
@section('title', 'Thêm mới phòng trọ')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="row">
                    <h4 class="card-title">Quản lý nhà cho thuê {{ $nhatro->ten }}</h4>
                    <a href="{{ route('nhatro.edit', ['id' => $nhatro->id]) }}" class=" ml-3"> Sửa tên</a>
                    {{-- <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Chức năng chung</h4>
                                <a href="{{ route('nhatro.tang.show', ['id' => $nhatro->id]) }}" type="button"
                                    class="btn btn-success mb-4">Quản Lý Tầng
                                </a>
                                <a href="{{ route('phongtro.themphong', ['id' => $nhatro->id]) }}" type="button"
                                    class="ml-3 btn btn-success mb-4">Thêm mới Phòng
                                </a>
                                <div type="button" class="ml-3 btn btn-info mb-4"> Tìm kiếm
                                </div>
                                <a href="{{ route('nhatro.themchiphi', ['id' => $nhatro->id]) }}" type="button"
                                    class="ml-3 btn btn-success mb-4">Chi phí dịch vụ
                                </a>
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body ">
                                                <h4 class="card-title">Chức năng</h4>
                                                <a href="{{ route('phongtro.themphong', ['id' => $nhatro->id]) }}"
                                                    type="button" class="btn btn-success mb-4">Thêm mới Tầng
                                                </a>
                                                <a href="{{ route('phongtro.themphong', ['id' => $nhatro->id]) }}"
                                                    type="button" class="btn btn-success mb-4">Thêm mới Phòng
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- @dd($phongtro) --}}
                    {!! generateMenuPhongCE($nhatro) !!}

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thêm mới phòng trọ</h4>
                                <form method="POST" class="forms-sample"
                                    action="{{ route('phongtro.storephong', ['id' => $nhatro->id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ten_phong">Nhập tên phòng trọ:</label>
                                        <input name="ten_phong" type="text" class="form-control" id="ten_phong"
                                            placeholder="Tên phòng trọ">
                                    </div>
                                    <div class="form-group">
                                        <label for="gia_phong">Nhập giá phòng:</label>
                                        <input name="gia_phong" type="number" class="form-control" id="gia_phong"
                                            placeholder="Giá phòng">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Chọn tầng . /</label>
                                        <a href="{{ route('nhatro.themtang', ['id' => $nhatro->id]) }}">Thêm mới tầng</a>
                                        <select name="id_tang" class="form-control form-control-sm"
                                            id="exampleFormControlSelect3">
                                            @foreach ($tang as $item)
                                                <option value="{{ $item->id }}">{{ $item->ten_tang }}</option>
                                            @endforeach
                                        </select>
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
@endsection
