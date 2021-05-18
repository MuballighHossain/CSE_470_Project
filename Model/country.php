<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'countries';
    public $primarykey ='id';
    public $timesstamps =true;
}
