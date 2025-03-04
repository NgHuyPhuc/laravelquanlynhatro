@extends('backend/master/master')
@section('title', 'Thêm mới nhà trọ')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                {{-- {!! generateMenuNguoiThue($nhatro, $phong, $check) !!} --}}
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm mới ảnh xe </h4>
                            <p class="card-description">
                                Thêm mới ảnh xe
                            </p>
                            <form class="forms-sample" method="POST"
                                action="{{ route('ngthue.storexe', ['id' => $nhatro->id, 'id_nguoithue' => $ngthue->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Ảnh CMND mặt trước</label>
                                    <input type="file" name="image[]" class="file-upload-default" id="cmndImage"
                                        onchange="updateFileName()" multiple>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" id="fileNameDisplay"
                                            disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <label class="file-upload-browse btn btn-primary" for="cmndImage">Chọn
                                                ảnh</label>
                                        </span>
                                    </div>
                                </div>
                                {{-- <div>
                            <label for="images">Chọn ảnh:</label>
                            <input type="file" name="images[]" id="images" multiple>
                        </div> --}}
                        <div id="fileDisplayArea"></div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // function updateFileName() {
        //     const fileInput = document.getElementById('cmndImage');
        //     const fileNameDisplay = document.getElementById('fileNameDisplay');

        //     // Hiển thị tên ảnh đã chọn
        //     if (fileInput.files.length > 0) {
        //         fileInput.files.forEach(element => {
        //             fileNameDisplay.value = element;
        //         });
        //         // fileNameDisplay.value = fileInput.files[0].name;
        //     } else {
        //         fileNameDisplay.value = '';  // Xóa nếu không có file
        //     }
        // }
        function updateFileName() {
            const fileInput = document.getElementById('cmndImage');
            const fileNameDisplay = document.getElementById('fileNameDisplay');
            const fileDisplayArea = document.getElementById('fileDisplayArea'); // Phần tử để hiển thị thông tin

            // Xóa nội dung cũ
            fileDisplayArea.innerHTML = '';

            // Kiểm tra xem có file được chọn không
            if (fileInput.files.length > 0) {
                let fileNames = [];
                // Lặp qua tất cả các file đã chọn
                Array.from(fileInput.files).forEach((file, index) => {
                    // Thêm tên file vào mảng
                    fileNames.push(file.name);

                    // Tạo một phần tử để hiển thị tên và ảnh
                    const fileInfo = document.createElement('div');
                    fileInfo.className = 'file-info';

                    // Hiển thị tên file
                    const fileName = document.createElement('p');
                    fileName.textContent = `File ${index + 1}: ${file.name}`;
                    fileInfo.appendChild(fileName);

                    // Hiển thị ảnh (nếu là file ảnh)
                    if (file.type.startsWith('image/')) {
                        const imagePreview = document.createElement('img');
                        imagePreview.src = URL.createObjectURL(file); // Tạo URL cho ảnh
                        imagePreview.style.maxWidth = '100px'; // Giới hạn kích thước ảnh
                        imagePreview.style.marginTop = '10px';
                        fileInfo.appendChild(imagePreview);
                    }

                    // Thêm thông tin file vào khu vực hiển thị
                    fileDisplayArea.appendChild(fileInfo);
                });

                // Hiển thị tên file trong input
                fileNameDisplay.value = fileNames.join(', ');
            } else {
                // Nếu không có file nào được chọn
                fileNameDisplay.value = ''; // Xóa nội dung trong input
                fileDisplayArea.innerHTML = '<p>Không có file nào được chọn.</p>';
            }
        }
    </script>
@endsection
