<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller{
    
    public function application(){
    	return view('inventory/setting/app');
    }

    public function user(){
    	return view('inventory/setting/user/user');
    }
}
