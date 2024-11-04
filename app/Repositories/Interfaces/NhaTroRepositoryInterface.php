<?php
namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface NhaTroRepositoryInterface extends BaseRepositoryInterface
{
    public function getTangandPhongTro($id);
}
?>
