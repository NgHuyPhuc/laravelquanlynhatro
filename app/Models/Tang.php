<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_nha_tro',
        'ten_tang',
    ];
    public function tang()
    {
        return $this->belongsTo(Tang::class, "id_nha_tro", "id");
    }
}
