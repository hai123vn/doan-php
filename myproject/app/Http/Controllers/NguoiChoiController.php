<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use App\NguoiChoi;

class NguoiChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function layDanhSach(Request $request) {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 25);

        $listNguoiChoi = NguoiChoi::orderBy('diem_cao_nhat', 'desc')->skip(($page - 1) * $limit)->take($limit)->get();

        return response()->json([
            'total' => NguoiChoi::count(),
            'data'  => $listNguoiChoi
        ]);
    }
    
    public function index()

    {
        //
        $dsNguoiChoi = NguoiChoi::all();
         return view('ds-nguoichoi',compact('dsNguoiChoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view ('')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NguoiChoi  $nguoiChoi
     * @return \Illuminate\Http\Response
     */
    public function show(NguoiChoi $nguoiChoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NguoiChoi  $nguoiChoi
     * @return \Illuminate\Http\Response
     */
    public function edit(NguoiChoi $nguoiChoi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NguoiChoi  $nguoiChoi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NguoiChoi $nguoiChoi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NguoiChoi  $nguoiChoi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $nguoichoi = NguoiChoi::findOrFail($id);
            $kq = $nguoichoi->delete();
            if ($kq) {
                return back()->with('msg', 'Xoá người chơi thành công');
            }
            return back()->withErrors('Xoá người chơi thất bại');
        } catch (Exception $e) {
            return back()->withErrors('Có lỗi xảy ra, mời thử lại sau');
        }
    }

    public function trashList()
        {
            $db = NguoiChoi::onlyTrashed()->get();
            return view('trash-nguoichoi', compact('db'));
        }

    public function restore(Request $request)
    {
        try {
            $id = $request->id;
            $kq = NguoiChoi::onlyTrashed()
                    ->findOrFail($id)
                    ->restore();
            if ($kq) {
                return redirect()->route('nguoi-choi.ds-nguoichoi');
            }
            return back()->withErrors('Khôi phục người chơi thất bại');
        } catch (Exception $ex) {
            return back()->withErrors('Có lỗi xãy ra, mời thử lại sau');
        }
    }
}
