<?php
namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface AnhXeRepositoryInterface extends BaseRepositoryInterface
{
    public function getByIdNgThue($idnguoithue);

}
?>
