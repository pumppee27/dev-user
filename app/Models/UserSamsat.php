<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSamsat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_samsat';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function hak_akses()
    {
        return $this->hasMany(HakAkses::class, 'id');
    }

    public function uppd()
    {
        return $this->hasMany(Uppd::class, 'id');
    }
}
