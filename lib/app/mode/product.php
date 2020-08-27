<?php

namespace App\Mode;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table='vp_products';
    protected $primaryKey ='pro_id';
    protected $guarded=[];
}
