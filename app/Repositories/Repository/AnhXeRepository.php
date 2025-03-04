<?php

namespace App\Repositories\Repository;

use App\Models\AnhXe;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\AnhXeRepositoryInterface;

class AnhXeRepository extends BaseRepository implements AnhXeRepositoryInterface
{
    public function __construct(AnhXe $anhxe)
    {
        parent::__construct($anhxe);
    }
    public function getByIdNgThue($idnguoithue)
    {
        return AnhXe::where('id_nguoi_thue', $idnguoithue);
    }
}
?>