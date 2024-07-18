<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pegawai';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function mutasi_pegawai()
    {
        return $this->hasMany(MutasiPegawai::class, 'pegawai_id');
    }
    public function uppd()
    {
        return $this->belongsTo(Uppd::class, 'id');
    }
    public function kategori_pegawai()
    {
        return $this->hasMany(KategoriPegawai::class, 'id');
    }
}
