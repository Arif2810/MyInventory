<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_product';
	protected $guarded  = ['created_at', 'updated_at']; 
}
