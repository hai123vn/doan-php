package com.example.traloicauhoi;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    EditText editUsername, editPassword;
    Button btnLogin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
//        editUsername =(EditText) findViewById(R.id.txtTaiKhoan);
//        editPassword =(EditText) findViewById(R.id.txtMatKhau);
//        btnLogin = (Button) findViewById(R.id.btnDangNhap);
    }

    public void DangNhap(View view) {
//        String username = "user";
//       String password = "user";
//        if (editUsername.getText().toString().equals(username) && editPassword.getText().toString().equals(password)) {
           Intent intent = new Intent(this, ManHinhChinhActivity.class);
           startActivity(intent);
   //    }
//      else
//      {
//           Toast.makeText(this,"Sai Tài Khoản Hoặc Mật Khẩu",Toast.LENGTH_SHORT).show();
//        }
    }

   public void QuenMatKhau(View view) {
        Intent intent = new Intent(this,QuenMatKhauActivity.class);
        startActivity(intent);
    }

    public void DangKy(View view) {
        Intent intent = new Intent(this,DangKyActivity.class);
        startActivity(intent);
    }
}
