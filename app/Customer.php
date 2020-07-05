<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
	
    protected $primaryKey = 'id_customer';
    protected $guarded  = ['created_at', 'updated_at']; 
}
