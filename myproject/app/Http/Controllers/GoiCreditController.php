<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoiCredit;


class GoiCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsGoiCredit = GoiCredit::all();
        return view('ds-goi-credit', compact('dsGoiCredit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('themmoi-goicredit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goiCredit = new GoiCredit;
        $goiCredit->ten_goi = $request->ten_goi;
        $goiCredit->credit = $request->credit;
        $goiCredit->so_tien = $request->so_tien;
        $goiCredit->save();

        // return back(); Quay ve trang truoc
        return redirect()->route('goi-credit.ds-goi-credit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dsGoiCredit = GoiCredit::find($id);
        return view('update-goicredit', compact('dsGoiCredit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dsGoiCredit = GoiCredit::find($request->id);
        $dsGoiCredit->ten_goi = $request->ten_goi;
        $dsGoiCredit->credit = $request->credit;
        $dsGoiCredit->so_tien = $request->so_tien;  
        $kq = $dsGoiCredit->save();
        return redirect()->route('goi-credit.ds-goi-credit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dsGoiCredit = GoiCredit::find($id);
        $dsGoiCredit -> Delete();
        return redirect() ->route('goi-credit.ds-goi-credit');
    }
}
