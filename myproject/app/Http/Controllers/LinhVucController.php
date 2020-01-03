<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinhVuc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinhVucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsLinhVuc = LinhVuc::all();
        return view('danhsachlinhvuc', compact('dsLinhVuc'));
        //return Auth::user();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themmoi-linhvuc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $linhVuc = new LinhVuc;
            $linhVuc->ten_linh_vuc = $request->ten_linh_vuc;
            $linhVuc->save();
            return back()->with('msg', "Thêm lĩnh vực thành công");
        } catch (Exception $e)
        {
            return back()
                        ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                        ->withInput();
        }
        

        // return back(); Quay ve trang truoc
        return redirect()->route('linh-vuc.danhsach');
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
        $dsLinhVuc = LinhVuc::find($id);
        return view('update-linhvuc', compact('dsLinhVuc'));
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
            $dsLinhVuc = LinhVuc::find($request->id);
            $dsLinhVuc->ten_linh_vuc = $request->ten_linh_vuc;  
            $kq = $dsLinhVuc->save();
            if ($kq) {
                return redirect()
                        ->route('linh-vuc.danhsach')
                        ->with('msg',"Cập nhật lĩnh vực thành công");
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
        try{
            $dsLinhVuc = LinhVuc::find($id);
            $dsLinhVuc -> Delete();
            return back()->with('msg', "Xóa lĩnh vực thành công");
        } catch (Exception $e)
        {
            return back()
                        ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                        ->withInput();
        }
    }

    public function trashList() {
        $trashList = LinhVuc::onlyTrashed()->get();
        return view('trash-linhvuc',compact('trashList'));
    }

    public function restore($id) {
        $linhVuc = LinhVuc::onlyTrashed()->find($id)->restore();
        return redirect()->route('linh-vuc.danhsach');
    }
}
