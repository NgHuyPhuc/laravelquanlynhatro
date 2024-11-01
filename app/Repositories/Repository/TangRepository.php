<?php

namespace App\Repositories\Repository;

use App\Models\Tang;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Interfaces\TangRepositoryInterface;

class TangRepository extends BaseRepository implements TangRepositoryInterface
// class TangRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function __construct(Tang $tang)
    {
        parent::__construct($tang);
    }
    public function getall($id)
    {
        return Tang::where('id_nha_tro', $id)->get();
    }
}
?>