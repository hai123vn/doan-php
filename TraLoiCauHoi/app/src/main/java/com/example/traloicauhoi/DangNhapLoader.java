package com.example.traloicauhoi;

import android.os.AsyncTask;

import java.util.HashMap;

//string 1: là tham số truyền vào doinbackgroup
//string 2: là tham số doinbackgroup trả về gì
//void onpostexcute trả về gì
public class DangNhapLoader extends AsyncTask<String,Void,String> {
    @Override
    protected String doInBackground(String... strings) {
        String tenDangNhap = strings[0];
        String password = strings[1];
        HashMap<String, String> params = new HashMap<>();
        params.put("ten_dang_nhap", tenDangNhap);
        params.put("mat_khau", password);
        return NetworkUtils.doRequest("dang-nhap", "POST", params, null);
    }
}
