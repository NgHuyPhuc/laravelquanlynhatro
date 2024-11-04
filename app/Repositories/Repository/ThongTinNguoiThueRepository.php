<?php

namespace App\Repositories\Repository;

use App\Models\ThongTinNguoiThue;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\ThongTinNguoiThueRepositoryInterface;

class ThongTinNguoiThueRepository extends BaseRepository implements ThongTinNguoiThueRepositoryInterface
{
    public function __construct(ThongTinNguoiThue $thongTinNguoiThue)
    {
        parent::__construct($thongTinNguoiThue);
    }
}
?>