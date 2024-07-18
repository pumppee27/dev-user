<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriLayanan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'uppd';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
}
