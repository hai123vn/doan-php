<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LichSuMuaCredit;

class LichSuMuaCreditController extends Controller
{
    public function index()
	    {
	        //
	        $dsLichSuMuaCredit = LichSuMuaCredit::all();
	        return view('lichsu-muacredit', compact('dsLichSuMuaCredit'));
	    }
}
