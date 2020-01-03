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
       

        // return back(); Quay ve trang truoc
        //return redirect()->route('goi-credit.ds-goi-credit');
        try{
            $goiCredit = new GoiCredit;
            $goiCredit->ten_goi = $request->ten_goi;
            $goiCredit->credit = $request->credit;
            $goiCredit->so_tien = $request->so_tien;
            $goiCredit->save();
            return back()->with('msg', "Thêm gói credit thành công");
        } catch (Exception $e)
        {
            return back()
                        ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                        ->withInput();
        }
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
        try {
            $dsGoiCredit = GoiCredit::find($request->id);
            $dsGoiCredit->ten_goi = $request->ten_goi;
            $dsGoiCredit->credit = $request->credit;
            $dsGoiCredit->so_tien = $request->so_tien;  
            $kq = $dsGoiCredit->save();
            if ($kq) {
                return redirect()
                        ->route('goi-credit.ds-goi-credit')
                        ->with('msg',"Cập nhật gói credit thành công");
             }
            return back()
                    ->withErrors('Cập nhật lĩnh vực thất bại')
                    ->withInput();
        } catch (Exception $e) {
            return back()
                    ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                    ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        //return redirect() ->route('goi-credit.ds-goi-credit');
         try{
            $dsGoiCredit = GoiCredit::find($id)->delete();
            return back()->with('msg', "Xóa lĩnh vực thành công");
        } catch (Exception $e)
        {
            return back()
                        ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                        ->withInput();
        }
    }


      public function trashList()
        {
            $db = GoiCredit::onlyTrashed()->get();
            return view('trash-goicredit', compact('db'));
        }

      public function restore(Request $request)
    {
        try {
            $id = $request->id;
            $kq = GoiCredit::onlyTrashed()
                    ->findOrFail($id)
                    ->restore();
            if ($kq) {
                return back()->with('msg', 'Khôi phục gói credit thành công');
            }
            return back()->withErrors('Khôi phục gói credit thất bại');
        } catch (Exception $ex) {
            return back()->withErrors('Có lỗi xãy ra, mời thử lại sau');
        }
    }
}
