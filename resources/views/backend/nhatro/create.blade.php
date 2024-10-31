@extends('backend/master/master')
@section('title', 'Thêm mới nhà trọ')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="row">
                <h4 class="card-title">Quản lý nhà cho thuê</h4>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Thêm mới nhà trọ</h4>
                        <form class="forms-sample" method="POST" action="{{ route('nhatro.create.post') }}">
                            @csrf
                          <div class="form-group">
                            <label for="exampleInputName1">Nhập tên nhà trọ:</label>
                            <input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="Tên nhà trọ.">
                          </div>
                          <button type="submit" class="btn btn-primary mr-2">Submit</button>
                          <button class="btn btn-light">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection
