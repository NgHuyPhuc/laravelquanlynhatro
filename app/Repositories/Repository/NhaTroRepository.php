<?php

namespace App\Repositories\Repository;

use App\Models\NhaTro;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Interfaces\NhaTroRepositoryInterface;

class NhaTroRepository extends BaseRepository implements NhaTroRepositoryInterface
// class NhaTroRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function __construct(NhaTro $nhatro)
    {
        parent::__construct($nhatro);
    }
    public function getTangandPhongTro($id){
        $nhatro = NhaTro::with(['tangdesc.phongtro'])->find($id);
        return $nhatro;
    }
}
?>