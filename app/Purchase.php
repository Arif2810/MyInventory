<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model{

    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'id_purchase';
}
