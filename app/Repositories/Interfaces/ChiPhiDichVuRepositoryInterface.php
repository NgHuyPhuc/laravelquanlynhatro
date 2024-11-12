<?php
namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface ChiPhiDichVuRepositoryInterface extends BaseRepositoryInterface
{
    public function getByNhaTroID($id_nha_tro);
}
?>
