<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HakAkses extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hak_akses';

    public function sub_hak_akses()
    {
        return $this->belongsTo(SubHakAkses::class, 'hak_akses_id');
    }
    public function user_samsat()
    {
        return $this->belongsTo(UserSamsat::class, 'hak_akses_id');
    }
}
