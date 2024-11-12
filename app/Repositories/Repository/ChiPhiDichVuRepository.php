<?php

namespace App\Repositories\Repository;

use App\Models\ChiPhiDichVu;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\ChiPhiDichVuRepositoryInterface;

class ChiPhiDichVuRepository extends BaseRepository implements ChiPhiDichVuRepositoryInterface
{
    public function __construct(ChiPhiDichVu $chiPhiDichVu)
    {
        parent::__construct($chiPhiDichVu);
    }
    public function getByNhaTroID($id_nha_tro){
        return ChiPhiDichVu::where('id_nha_tro', $id_nha_tro);
    }
}
?>