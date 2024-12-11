@extends('backend/master/master')
@section('title', 'Danh sách số điện nước')
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
          {!! generateMenuPhong($nhatro, $phong, $check) !!}
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh sách người Số Điện Nước {{$phong->ten_phong}}</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                             STT
                            </th>
                            <th>
                              Số điện
                            </th>
                            <th>
                              Số nước
                            </th>
                            <th>
                              Tháng
                            </th>
                            <th>
                              Chức năng
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($diennuoc as $key=> $item)
                            <tr>
                                <td >
                                    {{$key+1}}
                                </td>
                                <td>
                                  {{$item->so_dien}}
                                </td>
                                <td>
                                  {{$item->so_nuoc}}
                                </td>
                                <td>
                                  {{ \Carbon\Carbon::parse($item->date)->format('m/Y')}}
                                </td>
                                
                                <td>
                                  <a href="{{route('sodien.nuoc.theophong.edit',['id' => $nhatro->id , 'id_phong' => $phong->id , 'id_sdn' => $item->id])}}" class="btn btn-warning" style="color: white;">Chỉnh sửa</a>
                                  <button type="button" id="openModalButton" class="btn btn-danger">Xóa</button>
                                </td>
                                <!-- Modal xác nhận -->
                            <div class="modal fade" id="confirmationModal" tabindex="-1"
                            aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmationModalLabel">Xác nhận hành động</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn thực hiện hành động này không? Hành động này sẽ không thể
                                        hoàn tác.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                        {{-- <button type="button" class="btn btn-danger" id="confirmButton">Đúng, thực
                                            hiện</button> --}}
                                  <a href="{{route('sodien.nuoc.theophong.delete',['id' => $nhatro->id , 'id_phong' => $phong->id , 'id_sdn' => $item->id])}}" class="btn btn-danger ml-3">Xóa</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                              </tr>
                            @endforeach
                        </tbody>  
                      </table>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <p class="mr-3">Trang:  </p>
                    {{ $diennuoc->links('backend.pagination.pagination') }}
                </div>
            </div>
              </div>
        </div>
    </div>
</div>
<script>
  // Khi nhấn vào nút "Xác nhận"
  document.getElementById('openModalButton').addEventListener('click', function() {
      // Mở modal xác nhận
      new bootstrap.Modal(document.getElementById('confirmationModal')).show();
  });
  document.getElementById('CancelButton').addEventListener('click', function() {
      new bootstrap.Modal(document.getElementById('confirmationModal')).hide();
  });
  // Khi người dùng nhấn vào nút "Đúng, thực hiện"
  document.getElementById('confirmButton').addEventListener('click', function() {
      // Gửi form
      document.getElementById('your-form').submit();
  });
</script>
@endsection