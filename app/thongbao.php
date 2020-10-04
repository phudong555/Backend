<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thongbao extends Model
{
    protected $table = 'thong_bao';
    
    protected $fillable = [
        'id',
        'content',
        'id_phongban',
        'status',
        'created_at',
        'updated_at'
    ];
}
