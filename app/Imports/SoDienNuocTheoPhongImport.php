<?php

namespace App\Imports;

use App\Models\SoDienNuocTheoPhong;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Throwable;

class SoDienNuocTheoPhongImport implements ToModel, WithHeadingRow, WithBatchInserts, SkipsOnError
{
    use SkipsFailures;

    /**
     * Xử lý từng dòng dữ liệu.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $dateString = trim($row['date']);
        Log::debug('Date String: ' . $dateString);  // Ghi lại giá trị ngày vào log

        try {
            // Kiểm tra xem có phải là số sê-ri không
            if (is_numeric($dateString)) {
                // Chuyển đổi số sê-ri Excel thành ngày hợp lệ
                $date = Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($dateString - 2)->format('Y-m-d');
            } else {
                // Nếu không phải số sê-ri, thử phân tích theo định dạng ngày thông thường
                $date = Carbon::parse($dateString)->format('Y-m-d');
            }
        } catch (\Exception $e) {
            Log::error('Invalid date format in row: ' . json_encode($row) . ' Error: ' . $e->getMessage());
            return null;  // Trả về null nếu không thể xử lý ngày
        }
        // Kiểm tra xem dữ liệu có hợp lệ không
        if (!$row['so_dien'] || !$row['so_nuoc'] || !$row['date']) {
            return null; // Bỏ qua bản ghi không hợp lệ
        }

        // Xử lý các giá trị cần thiết
        $chiPhiPhatSinh = !empty($row['chi_phi_phat_sinh']) ? $row['chi_phi_phat_sinh'] : 'Không có';
        $tienPhatSinh = is_numeric($row['tien_phat_sinh']) ? $row['tien_phat_sinh'] : 0;
        return new SoDienNuocTheoPhong([
            'id_phong_tro' => $row['id_phong_tro'],
            'so_dien' => $row['so_dien'],
            'so_nuoc' => $row['so_nuoc'],
            'date' => $date,
            'chi_phi_phat_sinh' => $chiPhiPhatSinh,
            'tien_phat_sinh' => $tienPhatSinh,
        ]);
    }

    /**
     * Tối ưu hóa việc nhập dữ liệu bằng cách sử dụng batch insert
     */
    public function batchSize(): int
    {
        return 1000; // Cài đặt số dòng mỗi lần nhập vào database (tăng hiệu suất)
    }

    /**
     * Xử lý khi gặp lỗi
     */
    public function onError(Throwable $e)
    {
        // Xử lý lỗi (nếu có)
        Log::error("Error importing row: " . $e->getMessage());
    }
}
