<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class congviec extends Model
{
    protected $table = 'job';

    protected $fillable = [
        'id',
        'name',
        'descript',
        'id_phongban',
        'daystarted',
        'status',
        'created_at',
        'updated_at'

    ];  
}
