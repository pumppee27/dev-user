<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lokasi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lokasi';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function level()
    {
        return $this->hasMany(Level::class, 'id');
    }

    public function uppd()
    {
        return $this->hasMany(Uppd::class, 'id');
    }
}
