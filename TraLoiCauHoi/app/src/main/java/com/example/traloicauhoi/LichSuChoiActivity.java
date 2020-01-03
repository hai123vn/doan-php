package com.example.traloicauhoi;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.TextView;

import java.util.ArrayList;

public class LichSuChoiActivity extends AppCompatActivity {
    private TextView mTen,mCredit;
    private String credit,username;
    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;

    private ArrayList<LichSuEntry> listLichSu;
    private RecyclerView rcv_LichSu;
    private LichSuAdapter adapter;
    private LichSuEntry lichSuEntry;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lich_su_choi);

        this.mTen=findViewById(R.id.txtTen);
        this.mCredit=findViewById(R.id.textCredit);
        sharedPreferences = getSharedPreferences("com.example.traloicauhoi", MODE_PRIVATE);
        editor = sharedPreferences.edit();

        this.username = sharedPreferences.getString("HOTEN","");
        this.credit = sharedPreferences.getString("CREDIT","");
        this.mTen.setText(username);
        this.mCredit.setText(credit);

        lichSuEntry = new LichSuEntry (this);
        listLichSu = lichSuEntry.dsLichSu(username);
        adapter=new LichSuAdapter(this,listLichSu);
        rcv_LichSu=findViewById(R.id.rcv_lich_su);
        rcv_LichSu.setAdapter(adapter);
        rcv_LichSu.setLayoutManager(new LinearLayoutManager(this));
    }
}
