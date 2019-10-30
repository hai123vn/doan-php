<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class QuanTriVien extends Authenticatable
{
    protected $table = 'quan_tri_viens';
}
