<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $table = 'orders';
    public $primarykey ='id';
    public $timesstamps =true;
}
