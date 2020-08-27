<?php

namespace App\Mode;

use Illuminate\Database\Eloquent\Model;

class commet extends Model
{
    protected $table='vp_comment';
    protected $primaryKey ='com_id';
    protected $guarded=[];
}