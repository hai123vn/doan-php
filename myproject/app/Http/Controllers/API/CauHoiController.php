<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CauHoi;
class CauHoiController extends Controller
{
     public function layCauHoi(Request $request)
     {
     	$dslinhvuc=$request->query("linh_vuc");
     	$cauhoi=Cauhoi::select('id','noi_dung','phuong_an_a','phuong_an_b','phuong_an_c','phuong_an_d','dap_an')->where('linh_vuc_id',$dslinhvuc)->get();
    	$result = [
    		'success'	=> true,
    		'data'		=> $cauhoi->random(1)->first()
    	];

    	return response()->json($result);
     } 
     	

}
