<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model{

	protected $primaryKey = 'id_supplier';
    protected $guarded  = ['created_ad', 'updated_at']; 
}
