<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\QuanTriVien;
use Illuminate\Support\Facades\Auth;

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

    public function xuLyDangNhap(Request $request)
    {
        $thongTin = $request->only(['ten_dang_nhap', 'mat_khau']);
        $qtv = QuanTriVien::where('ten_dang_nhap', $thongTin['ten_dang_nhap'])->first();

        if($qtv == null)
        {
            return "sai tên đăng nhập";
        } 

        if(!Hash::check($thongTin['mat_khau'], $qtv->mat_khau))
        {
            return "sai mật khẩu";
        }

        Auth::login($qtv);
        
            return redirect()->route('trang-chu');
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

