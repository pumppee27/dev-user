<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriTitikLayanan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'kategori_titik_layanan';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function titik_layanan()
    {
        return $this->belongsTo(
            TitikLayanan::class,
            'kategori_titik_layanan_id'
        );
    }
}
