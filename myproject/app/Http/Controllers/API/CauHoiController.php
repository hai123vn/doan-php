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
     // 	$cauhoi=Cauhoi::where('linh_vuc_id',$dslinhvuc)->get()->random(1);
    	// $result = [
    	// 	'success'	=> true,
    	// 	'data'		=> $cauhoi
    	// ];

    	// return response()->json($result);
     // } 
     	return $dslinhvuc;
     }

}
