@extends('backend/master/master')
@section('title', 'Thêm mới tầng nhà trọ')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="row">
                    <h4 class="card-title">Quản lý tầng nhà cho thuê</h4>
                    {!! generateMenuTang($nhatro) !!}

                    <div class="col-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          {{-- @dd($id) --}}
                          <h4 class="card-title">Thêm mới tầng trọ</h4>
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                                <form class="forms-sample" method="POST"
                                    action="{{ route('nhatro.storetang', ['id' => $id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Nhập tên tầng trọ:</label>
                                        <input required name="ten_tang" value="{{ old('ten_tang')}}" type="text" class="form-control"
                                            id="exampleInputName1" placeholder="Tên Tầng (Nhập chữ)">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Nhập tên tầng (Số):</label>
                                        <input required name="ten_tang_so" value="{{ old('ten_tang_so')}}" type="number" class="form-control"
                                            id="exampleInputName1" placeholder="Nhập Số">
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
