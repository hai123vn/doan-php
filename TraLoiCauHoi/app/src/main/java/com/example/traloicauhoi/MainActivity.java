package com.example.traloicauhoi;

import androidx.appcompat.app.AppCompatActivity;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

public class MainActivity extends AppCompatActivity {

    EditText editUsername, editPassword;
    Button btnLogin;

    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;

    private static final String FILE_NAME_SHAREREF = "com.doanltandroid.quizme";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        sharedPreferences = getSharedPreferences(FILE_NAME_SHAREREF, MODE_PRIVATE);
        editor = sharedPreferences.edit();

        editUsername =(EditText) findViewById(R.id.txtTaiKhoan);
        editPassword =(EditText) findViewById(R.id.txtMatKhau);
        btnLogin = (Button) findViewById(R.id.btnDangNhap);
    }

    public void DangNhap(View view) {
        String tenDangNhap=editUsername.getText().toString();
        String password=editPassword.getText().toString();

        final ProgressDialog dialog = new ProgressDialog(this);
        dialog.setTitle("Đang đăng nhập");
        dialog.setMessage("Chờ xử lý...");
        dialog.show();
        new DangNhapLoader(){
            @Override
            protected void onPostExecute(String s) {
                dialog.cancel();
                try{
                    JSONObject json = new JSONObject(s);
                    boolean status = json.getBoolean("status");
                    if(status)
                    {
                        String token="Bear "+json.getString("token");
                        editor.putString("TOKEN",token);
                        editor.commit();
                        Intent intent = new Intent(MainActivity.this, ManHinhChinhActivity.class);
                        startActivity(intent);
                    }
                    else
                    {
                        String message = json.getString("message");
                        taoThongBao("Thông Báo", message).show();
                    }
                }catch (JSONException e)
                {
                    e.printStackTrace();
                }
            }
        }.execute(tenDangNhap,password);
    }

   public void QuenMatKhau(View view) {
        Intent intent = new Intent(this,QuenMatKhauActivity.class);
        startActivity(intent);
    }

    public void DangKy(View view) {
        Intent intent = new Intent(this,DangKyActivity.class);
        startActivity(intent);
    }

    public AlertDialog taoThongBao(String tieuDe, String thongBao) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setMessage(thongBao).setTitle(tieuDe);
        builder.setPositiveButton("Đồng ý", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {

            }
        });
        return builder.create();
    }
}
