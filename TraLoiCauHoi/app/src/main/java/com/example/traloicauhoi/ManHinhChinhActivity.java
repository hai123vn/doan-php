package com.example.traloicauhoi;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class ManHinhChinhActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_man_hinh_chinh);
    }

    public void QuanLyTaiKhoan(View view) {
        Intent intent = new Intent(this,QuanLyTaiKhoanActivity.class);
        startActivity(intent);
    }

    public void ChonLinhVuc(View view) {
        Intent intent = new Intent(this,ChonLinhVucActivity.class);
        startActivity(intent);
    }

    public void LichSuChoi(View view) {
        Intent intent = new Intent(this,LichSuChoiActivity.class);
        startActivity(intent);
    }

    public void BangXepHang(View view) {
        Intent intent = new Intent(this,XepHangActivity.class);
        startActivity(intent);
    }

    public void MuaCredit(View view) {
        Intent intent = new Intent(this,MuaCreditActivity.class);
        startActivity(intent);
    }
}
