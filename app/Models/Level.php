<?php

namespace App\Models;

use App\Http\Controllers\LokasiController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory;

    protected $table = 'level';
    protected $guarded = ['id'];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'level_id');
    }
}
