<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MutasiPegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mutasi_pegawai';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id');
    }
}
