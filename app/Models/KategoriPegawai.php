<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriPegawai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kategori_pegawai';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'kategoti_pegawai_id');
    }
}
