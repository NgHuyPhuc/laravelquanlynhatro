<?php

namespace App\Repositories\Repository;

use App\Models\SoDienNuocTheoPhong;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\SoDienNuocTheoPhongRepositoryInterface;

class SoDienNuocTheoPhongRepository extends BaseRepository implements SoDienNuocTheoPhongRepositoryInterface
{
    public function __construct(SoDienNuocTheoPhong $soDienNuocTheoPhong)
    {
        parent::__construct($soDienNuocTheoPhong);
    }
}
?>