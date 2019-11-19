<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\QuanTriVien;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangNhapRequest;


class QuanTriVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dangNhap()
    {
        return view('dangnhap');
    }

    public function xuLyDangNhap(DangNhapRequest $request)
    {
        $thongTin = $request->only(['ten_dang_nhap', 'mat_khau']);

        if(Auth::attempt(['ten_dang_nhap' => $thongTin['ten_dang_nhap'], 'password' => $thongTin['mat_khau']])) {
            return redirect()->route('trang-chu');
        }
            return redirect()->back()->with('thong-bao', 'Đăng nhập thất bại');
             
    }

    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }

    protected $redirectTo = 'trang-chu';
    protected function redirectTo()
    {
        return 'trang-chu';
    }
}

