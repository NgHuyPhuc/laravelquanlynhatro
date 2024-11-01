<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaTro extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ten',
    ];
    public function tang(){
        return $this->hasMany(Tang::class ,"id_nha_tro","id");
    }
}
