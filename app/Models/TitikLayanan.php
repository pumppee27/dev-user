<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TitikLayanan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'titik_layanan';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'lokasi_id';

    public function uppd()
    {
        return $this->belongsTo(Uppd::class, 'id');
    }

    public function kategori_titik_layanan()
    {
        return $this->hasMany(KategoriTitikLayanan::class, 'id');
    }
}
