<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function dangNhap(Request $request) {
    	$credentials = [
    		'ten_dang_nhap' => $req->ten_dang_nhap;
    		'mat_khau' => $req->mat_khau;
    	];
    	#chứng thực
    	if (!$token = auth('api')->attemp($credentials)) {
    		# sai tên đăng nhập || mật khẩu
    		return response()->json([
    			'status' => false,
    			'messsage' => 'Unauthorized.'
    		], 401);
    	}
    	#chứng thực thành công
    	return response()->json([
    		'status' => true,
    		'messsage' => 'Authorized',
    		'token' => $token,
    		'type' => 'bearer',
    		'exprires' => auth('api')->factory()->getTTL() * 60
    	], 200);
    }

    public function layThongTin() {
        return auth('api')->user();
    }
}
