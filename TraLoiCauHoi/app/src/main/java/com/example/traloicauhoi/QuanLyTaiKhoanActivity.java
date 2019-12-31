package com.example.traloicauhoi;

import androidx.appcompat.app.AppCompatActivity;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.EditText;

public class QuanLyTaiKhoanActivity extends AppCompatActivity {

    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;
    private static final String FILE_NAME_SHAREREF = "com.example.traloicauhoi";
    private EditText mTenTK,mEmail,mMatKhau,mNhapLaiMK;
    private String tentk,email;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_quan_ly_tai_khoan);

        this.mTenTK=findViewById(R.id.txtTaiKhoan);
        this.mEmail=findViewById(R.id.txtEmail);
        this.mMatKhau=findViewById(R.id.txtMatKhau);
        this.mNhapLaiMK=findViewById(R.id.txtXacNhanMatKhau);

        sharedPreferences = getSharedPreferences(FILE_NAME_SHAREREF, MODE_PRIVATE);
        editor = sharedPreferences.edit();
        this.tentk=sharedPreferences.getString("HOTEN","");
        this.email=sharedPreferences.getString("EMAIL","");

        this.mTenTK.setText(tentk);
        this.mEmail.setText(email);
    }
}
