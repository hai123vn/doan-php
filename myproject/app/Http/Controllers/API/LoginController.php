<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function dangNhap(Request $request) {
    	$credentials = [
    		'ten_dang_nhap' => $request->ten_dang_nhap,
    		'password' => $request->mat_khau
    	];
    	#chứng thực
    	if (!$token = auth('api')->attempt($credentials)) {
    		# sai tên đăng nhập || mật khẩu
    		return response()->json([
    			'status' => false,
    			'message' => 'Unauthorized'
                // 'message' => 'Sai tài khoản hoặc mật khẩu'
    		], 401);
    	}
    	#chứng thực thành công
    	return response()->json([
    		'status' => true,
    		'message' => 'Authorized',
    		'token' => $token,
    		'type' => 'bearer',
    		'exprires' => auth('api')->factory()->getTTL() * 60
    	], 200);
    }

    public function layThongTin() {
        return auth('api')->user();
    }
}
