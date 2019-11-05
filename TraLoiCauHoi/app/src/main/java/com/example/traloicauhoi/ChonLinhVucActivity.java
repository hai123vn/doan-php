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

import org.json.JSONArray;
import org.json.JSONObject;

import java.lang.ref.WeakReference;
import java.util.ArrayList;
import java.util.WeakHashMap;

public class ChonLinhVucActivity extends AppCompatActivity implements LoaderManager.LoaderCallbacks<String>{
    private Button btnLinhVuc;
    private Button btnLinhVuc1;
    private Button btnLinhVuc2;
    private Button btnLinhVuc3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chon_linh_vuc);

        btnLinhVuc=findViewById(R.id.btnLinhVuc);
        btnLinhVuc1=findViewById(R.id.btnLinhVuc1);
        btnLinhVuc2=findViewById(R.id.btnLinhVuc2);
        btnLinhVuc3=findViewById(R.id.btnLinhVuc3);

        if(getSupportLoaderManager().getLoader(0)!=null)
        {
            getSupportLoaderManager().initLoader(0,null,this);
        }

        getSupportLoaderManager().restartLoader(0,null,this);

    }

    public void TraLoiCauHoi(View view) {
        Intent intent = new Intent(this,TraLoiCauHoiActivity.class);
        startActivity(intent);


    }


    @NonNull
    @Override
    public Loader<String> onCreateLoader(int id, @Nullable Bundle args) {
        return new LinhVucLoader(this);
    }

    @Override
    public void onLoadFinished(@NonNull Loader<String> loader, String data) {
        try {
            JSONObject jsonObject = new JSONObject(data);//Nhận chuỗi json
            JSONArray itemArray = jsonObject.getJSONArray("data"); //lay ds linh vuc

            //gán cho button
            // chỉ có 4 chuỗi nên getJSON 0->3
            btnLinhVuc.setText(itemArray.getJSONObject(0).getString("ten_linh_vuc"));
            btnLinhVuc1.setText(itemArray.getJSONObject(1).getString("ten_linh_vuc"));
            btnLinhVuc2.setText(itemArray.getJSONObject(2).getString("ten_linh_vuc"));
            btnLinhVuc3.setText(itemArray.getJSONObject(3).getString("ten_linh_vuc"));


        }catch (Exception e)
        {
            e.printStackTrace();
        }
    }

    @Override
    public void onLoaderReset(@NonNull Loader<String> loader) {

    }
}
