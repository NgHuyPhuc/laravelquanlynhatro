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
    public function countdata($id_phong)
    {
        return SoDienNuocTheoPhong::where('id_phong_tro', $id_phong)->count();
    }
    public function getLastest($id_phong)
    {
        return SoDienNuocTheoPhong::where('id_phong_tro', $id_phong)->orderBy('date', 'desc')->take(1)->first();
    }
    public function getSecondLastest($id_phong)
    {
        return SoDienNuocTheoPhong::where('id_phong_tro', $id_phong)->orderBy('date', 'desc')->skip(1)->take(1)->first();
    }
    public function getByPhong($id_phong)
    {
        return SoDienNuocTheoPhong::where('id_phong_tro', $id_phong);
    }
    public function getOneWithIdPhong($id_phong)
    {
        return SoDienNuocTheoPhong::where('id_phong_tro', $id_phong)->latest()->first();
    }
    public function checkExists($id_phong)
    {
        return SoDienNuocTheoPhong::where('id_phong_tro', $id_phong)->exists();
    }
    public function createMany(array $data)
    {
        return SoDienNuocTheoPhong::insert($data);
    }
}
