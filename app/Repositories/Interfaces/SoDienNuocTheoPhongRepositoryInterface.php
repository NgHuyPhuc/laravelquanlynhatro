<?php
namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepositoryInterface;

interface SoDienNuocTheoPhongRepositoryInterface extends BaseRepositoryInterface
{
    public function countdata($id_phong);
    public function getLastest($id_phong);
    public function getSecondLastest($id_phong);
    public function getByPhong($id_phong);
    public function getOneWithIdPhong($id_phong);
    public function createMany(array $data);
    public function checkExists($id_phong);
}
?>
