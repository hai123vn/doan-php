<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\LinhVuc;
class CauHoi extends Model
{	
	use SoftDeletes;
    protected $table = "cau_hois";
    protected $filltable = ['id', 'noi_dung', 'linh_vuc_id', 'phuong_an_a', 'phuong_an_b', 'phuong_an_c', 'phuong_an_d', 'dap_an'];

  
  public function linhVuc()
    {
    	return $this->belongsTo('App\LinhVuc');
    }
  public function luotChoi() {
  	return $this->belongsToMany('App\LuotChoi', 'chi_tiet_luot_choi');
  }
}