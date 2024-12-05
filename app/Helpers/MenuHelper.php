<?php
if (!function_exists('MenuTang')) {
    function generateMenuTang($nhatro)
    {
        $html = '<div class="col-12 grid-margin stretch-card">';
        $html .= '<div class="card">';
        $html .= '<div class="card-body">';
        $html .= '<h4 class="card-title">Chức năng chung</h4>';
        // Quản lý tầng
        $html .= '<a href="' . route('nhatro.tang.show', ['id' => $nhatro->id]) . '" class="btn btn-success mb-4">Quản Lý Tầng</a>';

        // Thêm mới phòng
        $html .= '<a href="' . route('phongtro.themphong', ['id' => $nhatro->id]) . '" class="ml-3 btn btn-success mb-4">Thêm mới Phòng</a>';

        // Tìm kiếm (Chức năng tìm kiếm này có thể cần thêm link, hiện tại bạn chỉ có class là btn-info)
        $html .= '<div type="button" class="ml-3 btn btn-info mb-4"> Tìm kiếm</div>';

        // Chi phí dịch vụ
        $html .= '<a href="' . route('nhatro.themchiphi', ['id' => $nhatro->id]) . '" class="ml-3 btn btn-success mb-4">Chi phí dịch vụ</a>';

        // Thêm mới tầng
        $html .= '<div class="row"><div class="col"><div class="card"><div class="card-body"><h4 class="card-title">Chức năng</h4>';
        $html .= '<a href="' . route('nhatro.themtang', ['id' => $nhatro->id]) . '" class="btn btn-success mb-4">Thêm mới Tầng</a>';
        $html .= '</div></div></div></div>';

        $html .= '</div></div></div>';

        return $html;
    }
}

if (!function_exists('MenuPhong')) {
    function generateMenuPhong($nhatro, $phongtro, $check)
    {
        $html = '<div class="col-12 grid-margin stretch-card">';
        $html .= '<div class="card">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<div class="card-body">';
        $html .= '<h4 class="card-title">Chức năng phòng : ' . htmlspecialchars($phongtro->ten_phong) . '</h4>';
        $html .= '<div class="template-demo">';

        // Điều kiện check
        if ($check == 0) {
            $html .= '<a href="' . route('phongtro.hoadon.sodiennuoc1', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) . '" class="btn btn-success">Thêm mới số tiền điện nước hiện tại</a>';
        } else {
            $html .= '<a href="' . route('phong.nguoithue.dangthue', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) . '" class="btn btn-info">Quản lý thông tin người thuê phòng</a>';
            $html .= '<a href="' . route('danh.sach.so.dien.nuoc', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) . '" class="btn btn-success">Danh sách số điện nước</a>';
            $html .= '<a href="' . route('sodien.nuoc.theophong.get', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) . '" class="btn btn-success">Nhập số điện nước</a>';
            $html .= '<a href="' . route('phongtro.hoadon.themhoadon', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) . '" class="btn btn-success">Tạo hóa đơn tiền phòng</a>';
        }

        // Các nút luôn hiển thị
        $html .= '<a href="' . route('nhatro.phong.hoadon.show.all.info', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) . '" class="btn btn-success">Xem hóa đơn tiền phòng</a>';
        $html .= '<a href="' . route('phongtro.suaphong.get', ['id' => $nhatro->id, 'id_phong' => $phongtro->id]) . '" class="btn btn-danger">Chỉnh sửa thông tin phòng</a>';

        // Nút ẩn (Xóa phòng)
        $html .= '<button hidden type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal">Xóa phòng</button>';

        $html .= '</div>'; // Kết thúc template-demo
        $html .= '</div>'; // Kết thúc card-body
        $html .= '</div>'; // Kết thúc col-md-12
        $html .= '</div>'; // Kết thúc row
        $html .= '</div>'; // Kết thúc card
        $html .= '</div>'; // Kết thúc col-12

        return $html;
    }
}

if (!function_exists('MenuPhongCE')) {
    function generateMenuPhongCE($nhatro)
    {
        $html = '<div class="col-12 grid-margin stretch-card">';
        $html .= '<div class="card">';
        $html .= '<div class="card-body">';
        $html .= '<h4 class="card-title">Chức năng chung</h4>';

        // Thêm các nút với route
        $html .= '<a href="' . route("nhatro.tang.show", ["id" => $nhatro->id]) . '" type="button" class="btn btn-success mb-4">Quản Lý Tầng</a>';
        $html .= '<a href="' . route("phongtro.themphong", ["id" => $nhatro->id]) . '" type="button" class="ml-3 btn btn-success mb-4">Thêm mới Phòng</a>';
        $html .= '<div type="button" class="ml-3 btn btn-info mb-4">Tìm kiếm</div>';
        $html .= '<a href="' . route("nhatro.chiphi.show", ["id" => $nhatro->id]) . '" type="button" class="ml-3 btn btn-success mb-4">Quản lý chi phí dịch vụ</a>';

        // Thêm phần chức năng khác
        $html .= '<div class="row"><div class="col"><div class="card"><div class="card-body">';
        $html .= '<h4 class="card-title">Chức năng</h4>';
        $html .= '<a href="' . route("phongtro.themphong", ["id" => $nhatro->id]) . '" type="button" class="btn btn-success mb-4">Thêm mới Tầng</a>';
        $html .= '<a href="' . route("phongtro.themphong", ["id" => $nhatro->id]) . '" type="button" class="btn btn-success mb-4 ml-3">Thêm mới Phòng</a>';
        $html .= '</div></div></div></div>';

        $html .= '</div></div></div>';

        return $html;
    }
}
