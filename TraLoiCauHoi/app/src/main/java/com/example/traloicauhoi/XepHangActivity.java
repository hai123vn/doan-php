package com.example.traloicauhoi;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.loader.app.LoaderManager;
import androidx.loader.content.Loader;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONObject;

public class XepHangActivity extends AppCompatActivity implements LoaderManager.LoaderCallbacks<String> {
    private TextView txtTenXH;
    private TextView txtDiemXH;
    private TextView txtTenXH1;
    private TextView txtDiemXH1;
    private TextView txtTenXH2;
    private TextView txtDiemXH2;
    private TextView mTen,mCredit;

    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;

    private String ten,credit;

    private static final String FILE_NAME_SHAREREF = "com.example.traloicauhoi";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_xep_hang);

        sharedPreferences = getSharedPreferences(FILE_NAME_SHAREREF, MODE_PRIVATE);
        editor = sharedPreferences.edit();

        txtTenXH=findViewById(R.id.txtTenXH);
        txtDiemXH=findViewById(R.id.txtDiemXH);
        txtTenXH1=findViewById(R.id.txtTenXH1);
        txtDiemXH1=findViewById(R.id.txtDiemXH1);
        txtTenXH2=findViewById(R.id.txtTenXH2);
        txtDiemXH2=findViewById(R.id.txtDiemXH2);
        mTen=findViewById(R.id.txtTen);
        mCredit=findViewById(R.id.textCredit);

        if(getSupportLoaderManager().getLoader(0)!=null)
        {
            getSupportLoaderManager().initLoader(0,null,this);
        }

        getSupportLoaderManager().restartLoader(0,null,this);

        this.ten=sharedPreferences.getString("HOTEN","");
        this.credit=sharedPreferences.getString("CREDIT","");
    }

    @NonNull
    @Override
    public Loader<String> onCreateLoader(int id, @Nullable Bundle args) {
        return new NguoiChoiLoader(this);
    }

    @Override
    public void onLoadFinished(@NonNull Loader<String> loader, String data) {

        try {
            JSONObject jsonObject = new JSONObject(data);//Nhận chuỗi json
            JSONArray itemArray = jsonObject.getJSONArray("data"); //lay ds nguoi choi

            //gán cho button
            // chỉ có 4 chuỗi nên getJSON 0->3
            txtTenXH.setText(itemArray.getJSONObject(0).getString("ten_dang_nhap"));
            txtDiemXH.setText(itemArray.getJSONObject(1).getString("diem_cao_nhat"));
            txtTenXH1.setText(itemArray.getJSONObject(2).getString("ten_dang_nhap"));
            txtDiemXH1.setText(itemArray.getJSONObject(3).getString("diem_cao_nhat"));
            txtTenXH2.setText(itemArray.getJSONObject(4).getString("ten_dang_nhap"));
            txtDiemXH2.setText(itemArray.getJSONObject(5).getString("diem_cao_nhat"));

            this.mTen.setText(ten);
            this.mCredit.setText(credit);

        }catch (Exception e)
        {
            e.printStackTrace();
        }

    }

    @Override
    public void onLoaderReset(@NonNull Loader<String> loader) {

    }
}
