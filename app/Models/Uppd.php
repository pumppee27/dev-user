<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uppd extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'uppd';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function titik_layanan()
    {
        return $this->hasMany(TitikLayanan::class, 'uppd_id');
    }

    public function pejabat()
    {
        return $this->hasMany(Pejabat::class, 'uppd_id');
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'uppd_id');
    }

    public function user_samsat()
    {
        return $this->belongsTo(UserSamsat::class, 'uppd_id');
    }
}
