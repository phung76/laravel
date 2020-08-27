<?php

namespace App\Mode;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table='vp_categories';
    protected $primaryKey ='cate_id';
    protected $guarded=[];
}
