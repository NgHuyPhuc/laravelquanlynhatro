@extends('backend/master/master')
@section('title', 'Tạo mới hóa đơn')
@section('main')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <div class="card-body">
                                    <h4 class="card-title">Quản lý hóa đơn phòng {{ $phong->ten_phong }}</h4>
                                    <div class="template-demo">
                                        <a href="{{ route('danh.sach.so.dien.nuoc', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}"
                                            class="btn btn-info"> Danh sách số điện nước</a>
                                        <a href="./themmoinguoithue.html" class="btn btn-info">Nhập số điện nước</a>
                                        <a href="./xemthongtinnguoithue.html" class="btn btn-info">Danh sách hóa đơn
                                            {{ $phong->ten_phong }}</a>
                                        <a href="{{ route('phongtro.hoadon.themhoadon', ['id' => $nhatro->id, 'id_phong' => $phong->id]) }}"
                                            class="btn btn-success">Tạo hóa đơn
                                            tiền phòng</a>
                                        <a href="./xemhoadontiennha.html" class="btn btn-success">Xem hóa đơn
                                            tiền phòng</a>
                                        <a href="./chinhsuathongtinphong.html" class="btn btn-danger">Chỉnh sửa
                                            thông tin phòng</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $total = 0;
                @endphp
                @foreach ($hoadon as $item)
                    <p hidden>{{ $total = $total + $item->so_tien_phai_tra }}</p>
                @endforeach
                <div class="d-flex justify-content-between col-12">
                    <div>
                        <button class="btn btn-primary" id="cap-all-btn">Chụp tất cả hóa đơn</button>
                        <div id="progress-container" style="display: none; margin-top: 20px;">
                            <div id="progress-bar"
                                style="
                                width: 0%; 
                                height: 30px; 
                                background-color: #4caf50; 
                                text-align: center; 
                                line-height: 30px; 
                                color: white;
                            ">
                                0%</div>
                        </div>
                    </div>
                    <div>
                        <h3>Tổng Tiền: {{ number_format($total) }}</h3>
                        <h3>Tiền Tiền Điện: {{ number_format($tien_dien) }}</h3>
                        <h3>Tổng Tiền Nước: {{ number_format($tien_nuoc) }}</h3>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <p class="mr-3">Trang: </p>
                        {{ $hoadon->links('backend.pagination.pagination') }}
                    </div>
                </div>
                @foreach ($hoadon as $item)
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class=""
                                    style="display: flex;align-items: center;justify-content: space-between;">
                                    <h3 class="card-title">Hóa đơn phòng {{ $item->phongtro->ten_phong }}</h3>
                                </div>
                                <div class="container">
                                    <div id="capture-{{ $item->id }}"
                                        data-phong="{{ $item->phongtro->ten_phong }} - Tiền phòng{{ $item->tien_phong_string }} - {{ $item->id }}"
                                        class="invoice"
                                        style="padding: 20px;border: 1px solid #ddd;border-radius: 5px;margin:20px;">
                                        <h2 class="text-center">Thông báo Tiền Phòng
                                        </h2>
                                        <h3 class="text-center">{{ $item->thang }}</h3>
                                        <br />

                                        <div style="display: flex; align-items: center;">
                                            <h4>Kính gửi anh/chị phòng: </h4>
                                            <h1 class="text-danger" style="margin-left: 10%;">
                                                {{ $item->phongtro->ten_phong }}</h1>
                                        </div>
                                        <br>
                                        <p style="font-size: 20px;"> {{ $item->thong_bao }}</p>
                                        <hr>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="custom-font-size font-weight-bold">STT</th>
                                                            <th class="custom-font-size font-weight-bold">Nội dung</th>
                                                            <th class="custom-font-size font-weight-bold text-center">Chi
                                                                tiết</th>
                                                            <th class="custom-font-size font-weight-bold">Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $stt = 1; // Khởi tạo số thứ tự
                                                        @endphp
                                                        <tr>
                                                            <td class="custom-font-size">{{ $stt++ }}</td>
                                                            <td class="custom-font-size">Tiền Phòng</td>
                                                            <td class="custom-font-size text-center">
                                                                {{ $item->tien_phong_string }}</td>
                                                            <td class="custom-font-size text-center"><label>
                                                                    {{ number_format($item->tien_phong_int) }}
                                                                </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="custom-font-size">{{ $stt++ }}</td>
                                                            <td class="custom-font-size">Điện</td>
                                                            <td class="custom-font-size text-center">
                                                                {{ $item->tien_dien_string }}</td>
                                                            <td class="custom-font-size text-center"><label>
                                                                    {{ number_format($item->tien_dien_int) }}
                                                                </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="custom-font-size">{{ $stt++ }}</td>
                                                            <td class="custom-font-size">Nước</td>
                                                            <td class="custom-font-size text-center">
                                                                {{ $item->tien_nuoc_string }}</td>
                                                            <td class="custom-font-size text-center"><label>
                                                                    {{ number_format($item->tien_nuoc_int) }}
                                                                </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="custom-font-size">{{ $stt++ }}</td>
                                                            <td class="custom-font-size">Internet</td>
                                                            <td class="custom-font-size text-center">
                                                                {{ $item->dung_mang == 0 ? '-' : $item->dung_mang }}</td>
                                                            <td class="custom-font-size text-center"><label>
                                                                    {{ $item->tien_mang == 0 ? '-' : number_format($item->tien_mang) }}
                                                                </label></td>
                                                        </tr>
                                                        @if ($item->tien_phat_sinh > 0)
                                                            <tr>
                                                                <td class="custom-font-size">{{ $stt++ }}</td>
                                                                <td class="custom-font-size">Chi phi phát sinh</td>
                                                                <td class="custom-font-size text-center">
                                                                    {{ $item->chi_phi_phat_sinh }}</td>
                                                                <td class="custom-font-size text-center"><label>
                                                                        {{ number_format($item->tien_phat_sinh) }} </label>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if ($item->tien_binh_nuoc_int > 0)
                                                            <tr>
                                                                <td class="custom-font-size">{{ $stt++ }}</td>
                                                                <td class="custom-font-size">Nước uống (Bình)</td>
                                                                <td class="custom-font-size text-center">
                                                                    {{ $item->tien_binh_nuoc_string }}</td>
                                                                <td class="custom-font-size text-center"><label>
                                                                        {{ number_format($item->tien_binh_nuoc_int) }}
                                                                    </label></td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <td class="custom-font-size font-weight-bold">
                                                            </td>
                                                            <td class="custom-font-size font-weight-bold"></td>
                                                            <td class="custom-font-size font-weight-bold text-center"> Tổng
                                                                Cộng </td>
                                                            <td class="custom-font-size font-weight-bold text-center">
                                                                <label> {{ number_format($item->so_tien_phai_tra) }}
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3 class="text-danger">Phương Thức Thanh Toán</h3>
                                                <ul style="list-style: none;">
                                                    <li>
                                                        <h5 class="text-danger">1. Tiền mặt</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">2. Chuyển khoản</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">Chủ tài khoản: {{ $cpdv->ten_chu_tk }}</h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">{{ $cpdv->chi_nhanh }}
                                                        </h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-danger">{{ $cpdv->noi_dung_ck }} {{ $item->phongtro->ten_phong }} chuyển khoản </h5>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="qr-code" style=" text-align: center; margin-top: 20px;">
                                                    <img style="width: 350px; height: 350px;"
                                                        src="/uploads/img/{{ $cpdv->anh_qr_code }}"
                                                        alt="QR Code Thanh Toán" />
                                                    <p style="text-align: center;"><strong>Mã QR Code Thanh Toán</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="js/html2canvas.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>

    {{-- 1-1 + loading bar --}}
    {{-- <script>
        // chup man hinh
        document.getElementById("cap-all-btn").onclick = async function() {
            // Tạo một đối tượng JSZip
            const zip = new JSZip();

            // Lấy tất cả các phần tử có chứa hóa đơn
            const invoices = document.querySelectorAll("[id^='capture']");
            const progressBar = document.getElementById("progress-bar");
            const progressContainer = document.getElementById("progress-container");

            // Hiển thị thanh loading
            progressContainer.style.display = "block";
            const totalInvoices = invoices.length;
            let processedCount = 0;

            // Duyệt qua từng hóa đơn và chụp ảnh
            for (let i = 0; i < invoices.length; i++) {
                const invoice = invoices[i];
                const id = invoice.getAttribute("id");
                const name = invoice.getAttribute("data-phong");;

                try {
                    // Chụp màn hình từng hóa đơn
                    const canvas = await html2canvas(invoice);
                    const imgData = canvas.toDataURL("image/png");
                    processedCount++;
                    const progress = Math.round((processedCount / totalInvoices) * 100);
                    progressBar.style.width = `${progress}%`;
                    progressBar.textContent = `${progress}%`;
                    // Lưu hình ảnh vào zip
                    // zip.file(`hoadon-${id}.png`, imgData.split(",")[1], {
                    zip.file(`${name}.png`, imgData.split(",")[1], {
                        base64: true
                    });
                } catch (error) {
                    console.error(`Lỗi khi chụp hóa đơn ${id}:`, error);
                }
            }

            // Ẩn thanh loading sau khi hoàn thành
            progressContainer.style.display = "none";
            // Tải xuống file zip
            zip.generateAsync({
                type: "blob"
            }).then(function(content) {
                const link = document.createElement("a");
                link.href = URL.createObjectURL(content);
                link.download = "hoa_don.zip";
                link.click();
            });
        };
    </script> --}}

    {{-- origin --}}
    {{-- <script>
        // Chụp màn hình
        document.getElementById("cap-all-btn").onclick = async function () {
            // Tạo một đối tượng JSZip
            const zip = new JSZip();
    
            // Lấy tất cả các phần tử có chứa hóa đơn
            const invoices = document.querySelectorAll("[id^='capture']");
    
            // Tạo danh sách các promise để chụp ảnh đồng thời
            const capturePromises = Array.from(invoices).map(async (invoice) => {
                const id = invoice.getAttribute("id");
                const name = invoice.getAttribute("data-phong");
    
                try {
                    // Chụp màn hình từng hóa đơn
                    const canvas = await html2canvas(invoice);
                    const imgData = canvas.toDataURL("image/png");
    
                    // Lưu hình ảnh vào zip
                    zip.file(`${name}.png`, imgData.split(",")[1], {
                        base64: true,
                    });
                } catch (error) {
                    console.error(`Lỗi khi chụp hóa đơn ${id}:`, error);
                }
            });
    
            // Chờ tất cả các promise hoàn thành
            await Promise.all(capturePromises);
    
            // Tải xuống file zip
            zip.generateAsync({ type: "blob" }).then(function (content) {
                const link = document.createElement("a");
                link.href = URL.createObjectURL(content);
                link.download = "hoa_don.zip";
                link.click();
            });
        };
    </script> --}}
    
    {{-- all no loading bar --}}
    {{-- <script>
        // Chụp màn hình
        document.getElementById("cap-all-btn").onclick = async function () {
            // Tạo một đối tượng JSZip
            const zip = new JSZip();
    
            // Lấy tất cả các phần tử có chứa hóa đơn
            const invoices = document.querySelectorAll("[id^='capture']");
    
            // Tạo danh sách các promise để chụp ảnh đồng thời
            const capturePromises = Array.from(invoices).map(async (invoice) => {
                const id = invoice.getAttribute("id");
                const name = invoice.getAttribute("data-phong");
    
                try {
                    // Chụp màn hình từng hóa đơn
                    const canvas = await html2canvas(invoice);
                    const imgData = canvas.toDataURL("image/png");
    
                    // Lưu hình ảnh vào zip
                    zip.file(`${name}.png`, imgData.split(",")[1], {
                        base64: true,
                    });
                } catch (error) {
                    console.error(`Lỗi khi chụp hóa đơn ${id}:`, error);
                }
            });
    
            // Chờ tất cả các promise hoàn thành
            await Promise.all(capturePromises);
    
            // Tải xuống file zip
            zip.generateAsync({ type: "blob" }).then(function (content) {
                const link = document.createElement("a");
                link.href = URL.createObjectURL(content);
                link.download = "hoa_don.zip";
                link.click();
            });
        };
    </script> --}}

    {{-- all + loading bar --}}
    {{-- <script>
        // JavaScript
        document.getElementById("cap-all-btn").onclick = async function() {
            const zip = new JSZip();
            const invoices = document.querySelectorAll("[id^='capture']");
            const progressBar = document.getElementById("progress-bar");
            const progressContainer = document.getElementById("progress-container");

            // Hiển thị thanh loading
            progressContainer.style.display = "block";

            // Tổng số hóa đơn
            const totalInvoices = invoices.length;
            let processedCount = 0;

            // Chụp từng hóa đơn và cập nhật thanh tiến trình
            const capturePromises = Array.from(invoices).map(async (invoice) => {
                const id = invoice.getAttribute("id");
                const name = invoice.getAttribute("data-phong");

                try {
                    const canvas = await html2canvas(invoice);
                    const imgData = canvas.toDataURL("image/png");

                    // Lưu hình ảnh vào zip
                    zip.file(`${name}.png`, imgData.split(",")[1], {
                        base64: true
                    });

                    // Cập nhật tiến trình
                    processedCount++;
                    const progress = Math.round((processedCount / totalInvoices) * 100);
                    progressBar.style.width = `${progress}%`;
                    progressBar.textContent = `${progress}%`;
                } catch (error) {
                    console.error(`Lỗi khi chụp hóa đơn ${id}:`, error);
                }
            });

            // Chờ tất cả các promise hoàn thành
            await Promise.all(capturePromises);

            // Ẩn thanh loading sau khi hoàn thành
            progressContainer.style.display = "none";

            // Tải xuống file zip
            zip.generateAsync({
                type: "blob"
            }).then((content) => {
                const link = document.createElement("a");
                link.href = URL.createObjectURL(content);
                link.download = "hoa_don.zip";
                link.click();
            });
        };
    </script> --}}

    {{-- batch + loading bar --}}
    <script>
        document.getElementById("cap-all-btn").onclick = async function() {
            const zip = new JSZip();
            const invoices = document.querySelectorAll("[id^='capture']");
            const progressBar = document.getElementById("progress-bar");
            const progressContainer = document.getElementById("progress-container");

            // Hiển thị thanh loading
            progressContainer.style.display = "block";

            const totalInvoices = invoices.length;
            let processedCount = 0;

            // Hàm xử lý từng hóa đơn
            const processInvoice = async (invoice) => {
                const id = invoice.getAttribute("id");
                const name = invoice.getAttribute("data-phong");

                try {
                    const canvas = await html2canvas(invoice);
                    const imgData = canvas.toDataURL("image/png");

                    // Lưu hình ảnh vào zip
                    zip.file(`${name}.png`, imgData.split(",")[1], {
                        base64: true
                    });

                    // Cập nhật tiến trình
                    processedCount++;
                    const progress = Math.round((processedCount / totalInvoices) * 100);
                    progressBar.style.width = `${progress}%`;
                    progressBar.textContent = `${progress}%`;
                } catch (error) {
                    console.error(`Lỗi khi chụp hóa đơn ${id}:`, error);
                }
            };

            // Hàm xử lý song song theo nhóm (batch)
            const processInBatches = async (batchSize) => {
                for (let i = 0; i < invoices.length; i += batchSize) {
                    const batch = Array.from(invoices).slice(i, i + batchSize);
                    await Promise.all(batch.map(processInvoice));
                }
            };

            // Chạy xử lý theo nhóm (mỗi nhóm 5 hóa đơn)
            // await processInBatches(12);
            await processInBatches(4);

            // Ẩn thanh loading sau khi hoàn thành
            progressContainer.style.display = "none";

            // Tải xuống file zip
            zip.generateAsync({
                type: "blob"
            }).then((content) => {
                const link = document.createElement("a");
                link.href = URL.createObjectURL(content);
                link.download = "hoa_don.zip";
                link.click();
            });
        };
    </script>


    {{-- dom to image --}}
    {{-- <script>
        document.getElementById("cap-all-btn").onclick = async function() {
            const zip = new JSZip();
            const invoices = document.querySelectorAll("[id^='capture']");
            const progressBar = document.getElementById("progress-bar");
            const progressContainer = document.getElementById("progress-container");
    
            // Hiển thị thanh loading
            progressContainer.style.display = "block";
    
            const totalInvoices = invoices.length;
            let processedCount = 0;
    
            // Hàm xử lý từng hóa đơn
            const processInvoice = async (invoice) => {
                const id = invoice.getAttribute("id");
                const name = invoice.getAttribute("data-phong");
    
                try {
                    // Sử dụng dom-to-image để chụp ảnh hóa đơn
                    const imgData = await domtoimage.toPng(invoice);
    
                    // Lưu hình ảnh vào zip
                    zip.file(`${name}.png`, imgData.split(",")[1], {
                        base64: true
                    });
    
                    // Cập nhật tiến trình
                    processedCount++;
                    const progress = Math.round((processedCount / totalInvoices) * 100);
                    progressBar.style.width = `${progress}%`;
                    progressBar.textContent = `${progress}%`;
                } catch (error) {
                    console.error(`Lỗi khi chụp hóa đơn ${id}:`, error);
                }
            };
    
            // Hàm xử lý song song theo nhóm (batch)
            const processInBatches = async (batchSize) => {
                for (let i = 0; i < invoices.length; i += batchSize) {
                    const batch = Array.from(invoices).slice(i, i + batchSize);
                    await Promise.all(batch.map(processInvoice));
                }
            };
    
            // Chạy xử lý theo nhóm (mỗi nhóm 5 hóa đơn)
            await processInBatches(5);
    
            // Ẩn thanh loading sau khi hoàn thành
            progressContainer.style.display = "none";
    
            // Tải xuống file zip
            zip.generateAsync({
                type: "blob"
            }).then((content) => {
                const link = document.createElement("a");
                link.href = URL.createObjectURL(content);
                link.download = "hoa_don.zip";
                link.click();
            });
        };
    </script> --}}
    
@endsection
