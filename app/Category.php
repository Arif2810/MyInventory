<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

	// protected $table = 'categories';
	// public $timestamps = false;
	// protected $fillable = ['id_category', 'kategori'];
	protected $primaryKey = 'id_category';
	protected $guarded  = ['created_at', 'updated_at']; 
    
}
