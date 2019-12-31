<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;
class NguoiChoi extends Authenticatable implements JWTSubject
{
   use SoftDeletes;
   protected $table = "nguoi_chois";
   protected $fillable = ['ten_dang_nhap', 'mat_khau', 'email', 'hinh_dai_dien', 'diem_cao_nhat', 'credit'];
    protected $hidden = ['mat_khau'];

   public function getPasswordAttribute() {
   		return $this->mat_khau;
   }

   public function getJWTIdentifier() {
   		return $this->getKey();
   }

   public function getJWTCustomClaims() {
   		return [];
   }
}
