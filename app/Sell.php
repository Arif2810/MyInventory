<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model{
    
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'id_sell';
}
