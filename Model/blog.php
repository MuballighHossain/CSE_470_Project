<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blogs';
    public $primarykey ='id';
    public $timesstamps =true;
}
