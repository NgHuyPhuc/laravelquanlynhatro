<?php
namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface TangRepositoryInterface extends BaseRepositoryInterface
{
    public function getall($id);
}
?>
