<?php

namespace App\Http\Middleware;

use App\Models\NhaTro;
use Closure;
use Illuminate\Http\Request;

class FetchNhaTroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu có `id` trong URL
        if ($request->route('id')) {
            // Lấy dữ liệu NhaTro từ ID và chia sẻ với các view
            $thongtinnhatro = NhaTro::find($request->route('id'));

            if (!$thongtinnhatro) {
                // Nếu không tìm thấy nhà trọ, có thể redirect về trang khác hoặc báo lỗi
                return redirect()->back()->withErrors(['errors' => 'Không tìm thấy nhà trọ']);
            }

            // Chia sẻ dữ liệu nhà trọ cho toàn bộ view
            view()->share('nhatro', $thongtinnhatro);
        }

        return $next($request);
    }
}
