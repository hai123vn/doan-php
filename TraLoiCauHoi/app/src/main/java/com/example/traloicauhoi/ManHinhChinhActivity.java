package com.example.traloicauhoi;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.media.session.MediaSession;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

public class ManHinhChinhActivity extends AppCompatActivity {
    private TextView mTen,mCredit;
    private String credit,username;
    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_man_hinh_chinh);

        this.mTen=findViewById(R.id.txtTen);
        this.mCredit=findViewById(R.id.txtCredit);
        sharedPreferences = getSharedPreferences("com.example.traloicauhoi", MODE_PRIVATE);
        editor = sharedPreferences.edit();

        this.username=sharedPreferences.getString("HOTEN","");
        this.credit=sharedPreferences.getString("CREDIT","");
        this.mTen.setText(username);
        this.mCredit.setText(credit);
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

    public void Thoat(View view) {
        editor.clear();
        editor.commit();
        Intent intent = new Intent(this,MainActivity.class);
        startActivity(intent);
    }
}
