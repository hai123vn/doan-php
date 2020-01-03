<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHoi;
use App\LinhVuc;

class CauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsCauHoi = CauHoi::all();
        $dsLinhVuc = LinhVuc::all();
        return view('ds-cauhoi', compact('dsCauHoi','dsLinhVuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $dsLinhVuc = LinhVuc::all();
            return view('themmoi-cauhoi', compact('dsLinhVuc'));
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
        $dsLinhVuc = LinhVuc::all();
        $cauhoi = new CauHoi;
        $cauhoi->noi_dung = $request->noi_dung;
        $cauhoi->linh_vuc_id = $request->linh_vuc_id;
        $cauhoi->phuong_an_a = $request->phuong_an_a;
        $cauhoi->phuong_an_b = $request->phuong_an_b;
        $cauhoi->phuong_an_c = $request->phuong_an_c;
        $cauhoi->phuong_an_d = $request->phuong_an_d;
        $cauhoi->dap_an = $request->dap_an;
        $cauhoi->save();
            return back()->with('msg', 'Thêm câu hỏi thành công');
        } catch (Exception $e)
        {
            return back()
                        ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                        ->withInput();
        }

        // return back(); Quay ve trang truoc
        return redirect()->route('cau-hoi.ds-cauhoi');
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
          $CauHoi = CauHoi::find($id);
          $dsLinhVuc = LinhVuc::all();
        return view('update-cauhoi', compact('CauHoi', 'dsLinhVuc'));
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
     //   return redirect()->route('cau-hoi.ds-cauhoi');
        try{
            $dsCauHoi = CauHoi::find($request->id);
            $dsCauHoi->noi_dung = $request->noi_dung;
            $dsCauHoi->linh_vuc_id = $request->linh_vuc_id;
            $dsCauHoi->phuong_an_a = $request->phuong_an_a;
            $dsCauHoi->phuong_an_b = $request->phuong_an_b;
            $dsCauHoi->phuong_an_c = $request->phuong_an_c;
            $dsCauHoi->phuong_an_d = $request->phuong_an_d;
            $dsCauHoi->dap_an = $request->dap_an;
            $kq = $dsCauHoi->save();
            if ($kq) {
                return redirect()
                        ->route('cau-hoi.ds-cauhoi')
                        ->with('msg', 'Cập nhật câu hỏi thành công');
            }
            return back()
                    ->withErrors('Cập nhật câu hỏi thất bại')
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
           
       // return redirect() ->route('cau-hoi.ds-cauhoi');
        try{
        $dsCauHoi = CauHoi::find($id)->delete();   
            return back()->with('msg', 'Xóa câu hỏi thành công');
        } catch (Exception $e)
        {
            return back()
                        ->withErrors('Có lỗi xảy ra, mời thử lại sau')
                        ->withInput();
        }
    }

    public function trashList() {
        $db = CauHoi::onlyTrashed()->get();
        return view('trash-cauhoi', compact('db'));
    }

    public function restore($id) {
        try {
            $cauHoi = CauHoi::onlyTrashed()->findOrFail($id);
            $cauHoi->restore();
            $linhVuc = LinhVuc::withTrashed()->findOrFail($cauHoi->linh_vuc_id)->restore();
                if ($cauHoi && $linhVuc) {
                    return redirect()->route('cau-hoi.ds-cauhoi');
                }
                    return back()->withErrors('Khôi phục câu hỏi thất bại');
            
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại');
        }
    }
}
