package com.example.traloicauhoi;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.loader.app.LoaderManager;
import androidx.loader.content.Loader;

import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONObject;

public class MuaCreditActivity extends AppCompatActivity implements LoaderManager.LoaderCallbacks<String> {
    private TextView mTenCredit,mGoiCredit,mTenCredit1,mGoiCredit1,mTenCredit2,mGoiCredit2,mTenCredit3,mGoiCredit3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mua_credit);

        mTenCredit=(TextView)findViewById(R.id.txtTenCredit);
        mTenCredit1=(TextView) findViewById(R.id.txtTenCredit1);
        mTenCredit2=(TextView) findViewById(R.id.txtTenCredit2);
        mTenCredit3=(TextView) findViewById(R.id.txtTenCredit3);

        mGoiCredit=(TextView)findViewById(R.id.txtCredit);
        mGoiCredit1=(TextView)findViewById(R.id.txtCredit1);
        mGoiCredit2=(TextView)findViewById(R.id.txtCredit2);
        mGoiCredit3=(TextView)findViewById(R.id.txtCredit3);

        if(getSupportLoaderManager().getLoader(0)!=null)
        {
            getSupportLoaderManager().initLoader(0,null,this);
        }

        getSupportLoaderManager().restartLoader(0,null,this);
    }


    @NonNull
    @Override
    public Loader<String> onCreateLoader(int id, @Nullable Bundle args) {
        return new CreditLoader(this);
    }

    @Override
    public void onLoadFinished(@NonNull Loader<String> loader, String data) {
        try {
            JSONObject jsonObject = new JSONObject(data);//Nhận chuỗi json
            JSONArray itemArray = jsonObject.getJSONArray("data"); //lay ds credit

            mGoiCredit.setText(itemArray.getJSONObject(0).getString("credit"));
            mTenCredit.setText(itemArray.getJSONObject(0).getString("ten_goi"));

            mGoiCredit1.setText(itemArray.getJSONObject(1).getString("credit"));
            mTenCredit1.setText(itemArray.getJSONObject(1).getString("ten_goi"));

            mGoiCredit2.setText(itemArray.getJSONObject(2).getString("credit"));
            mTenCredit2.setText(itemArray.getJSONObject(2).getString("ten_goi"));

            mGoiCredit3.setText(itemArray.getJSONObject(3).getString("credit"));
            mTenCredit3.setText(itemArray.getJSONObject(3).getString("ten_goi"));
        }catch (Exception e)
        {
            e.printStackTrace();
        }


    }

    @Override
    public void onLoaderReset(@NonNull Loader<String> loader) {

    }
}
