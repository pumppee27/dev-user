<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubHakAkses extends Model
{
    use HasFactory;

    protected $table = 'sub_hak_akses';

    public function hak_akses()
    {
        return $this->hasMany(HakAkses::class, 'id');
    }
}
