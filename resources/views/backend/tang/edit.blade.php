@extends('backend/master/master')
@section('title', 'Sửa tên tầng nhà trọ')
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
                        <h4 class="card-title">Sửa tên mới tầng trọ</h4>
                        @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                        <form class="forms-sample" method="POST" action="{{route('nhatro.suatang.post',['id' => $id, 'id_tang' => $tang->id])}}">
                            @csrf
                          <div class="form-group">
                            <label for="exampleInputName1">Nhập tên tầng trọ:</label>
                            <input name="ten_tang" type="text" class="form-control" id="exampleInputName1" value="{{$tang->ten_tang}}" placeholder="Tầng . . .">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Nhập tầng trọ (Số):</label>
                            <input name="ten_tang_so" type="number" class="form-control" id="exampleInputName1" value="{{$tang->ten_tang_so}}" placeholder="Tầng . . .">
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