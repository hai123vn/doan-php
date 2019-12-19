package com.example.traloicauhoi;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.loader.app.LoaderManager;
import androidx.loader.content.Loader;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONObject;

public class TraLoiCauHoiActivity extends AppCompatActivity implements LoaderManager.LoaderCallbacks<String> {

    private TextView mNoiDung;
    private Button btnA;
    private Button btnB;
    private Button btnC;
    private Button btnD;
    private int mID;

    private String kq,CauTraLoi;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tra_loi_cau_hoi);

        Intent intent = getIntent();
        this.mID = intent.getIntExtra("ID",1);

        this.mNoiDung=findViewById(R.id.txtNoiDung);
        this.btnA=findViewById(R.id.btnCauA);
        this.btnB=findViewById(R.id.btnCauB);
        this.btnC=findViewById(R.id.btnCauC);
        this.btnD=findViewById(R.id.btnCauD);

        if (getSupportLoaderManager().getLoader(0) != null)
        {
            getSupportLoaderManager().initLoader(0, null, this);
        }
        getSupportLoaderManager().restartLoader(0, null, this);
    }

    @NonNull
    @Override
    public Loader<String> onCreateLoader(int id, @Nullable Bundle args) {
        return new TraLoiCauHoiLoader(this,this.mID);
    }

    @Override
    public void onLoadFinished(@NonNull Loader<String> loader, String data) {
      try {
          JSONObject jsonObject = new JSONObject(data);
          JSONObject json = jsonObject.getJSONObject("data");

          this.kq=json.getString("dap_an");

          this.mNoiDung.setText(json.getString("noi_dung"));
          this.btnA.setText(json.getString("phuong_an_a"));
          this.btnB.setText(json.getString("phuong_an_b"));
          this.btnC.setText(json.getString("phuong_an_c"));
          this.btnD.setText(json.getString("phuong_an_d"));
      }catch (Exception e)
      {
          e.printStackTrace();
      }
    }

    @Override
    public void onLoaderReset(@NonNull Loader<String> loader) {

    }


    public void CheckCauTraLoi(View view) {

    }
}
