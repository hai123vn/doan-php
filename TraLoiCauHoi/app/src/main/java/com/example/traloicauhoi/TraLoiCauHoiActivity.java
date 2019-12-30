package com.example.traloicauhoi;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.loader.app.LoaderManager;
import androidx.loader.content.Loader;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import android.animation.ArgbEvaluator;
import android.animation.ObjectAnimator;
import android.animation.ValueAnimator;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.Drawable;
import android.media.Image;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONObject;

public class TraLoiCauHoiActivity<countDownTimer> extends AppCompatActivity implements LoaderManager.LoaderCallbacks<String> {

    public TextView mNoiDung,mSoCau,mDiem,mTime;
    public ImageView mImg1,mImg2,mImg3,mImg4,mImg5;
    private Button btnA;
    private Button btnB;
    private Button btnC;
    private Button btnD;
    private int mID;
    private static int SoCau=1,CauSai=0;
    private static int ChonLinhVuc=1;
    private static int Diem=0;
    private String kq="",CauTraLoi="";
    private CountDownTimer countDownTimer;

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
        this.mSoCau=findViewById(R.id.txtCau);
        this.mDiem=findViewById(R.id.txtDiem);
        this.mTime=findViewById(R.id.txtTime);
        this.mImg1=findViewById(R.id.img1);
        this.mImg2=findViewById(R.id.img2);
        this.mImg3=findViewById(R.id.img3);
        this.mImg4=findViewById(R.id.img4);
        this.mImg5=findViewById(R.id.img5);
        if (getSupportLoaderManager().getLoader(0) != null)
        {
            getSupportLoaderManager().initLoader(0, null, this);
        }
        getSupportLoaderManager().restartLoader(0, null, this);

        StarTime();

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
          this.mSoCau.setText(Integer.toString(SoCau));
          this.mDiem.setText(Integer.toString(Diem));
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

    //time
    public void StarTime() {
        this.countDownTimer = new CountDownTimer(31000, 1000) {
            @Override
            public void onTick(long millisUntilFinished) {
                mTime.setText(String.valueOf(millisUntilFinished / 1000));
            }

            @Override
            public void onFinish() {
               Toast.makeText(TraLoiCauHoiActivity.this,"Đã hết giờ",Toast.LENGTH_SHORT).show();
               Intent intent = new Intent(TraLoiCauHoiActivity.this,ManHinhChinhActivity.class);
               startActivity(intent);
            }
        }.start();

    }
    public void StopTime()
    {
        countDownTimer.cancel();
    }

    public void LuotChoi(int cauSai)
    {
        if(cauSai==1)
            mImg5.setVisibility(View.INVISIBLE);
        else if(cauSai==2){
            mImg5.setVisibility(View.INVISIBLE);
            mImg4.setVisibility(View.INVISIBLE);
        }
        else if(cauSai==3) {
            mImg5.setVisibility(View.INVISIBLE);
            mImg4.setVisibility(View.INVISIBLE);
            mImg3.setVisibility(View.INVISIBLE);
        }
        else if(cauSai==4) {
            mImg5.setVisibility(View.INVISIBLE);
            mImg4.setVisibility(View.INVISIBLE);
            mImg3.setVisibility(View.INVISIBLE);
            mImg2.setVisibility(View.INVISIBLE);
        }
        else if(cauSai==5) {
            mImg5.setVisibility(View.INVISIBLE);
            mImg4.setVisibility(View.INVISIBLE);
            mImg3.setVisibility(View.INVISIBLE);
            mImg2.setVisibility(View.INVISIBLE);
            mImg1.setVisibility(View.INVISIBLE);
            this.CauSai=0;
            Toast.makeText(this,"Bạn Đã Thua Cuộc",Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    public void onLoaderReset(@NonNull Loader<String> loader) {

    }
    public void TangSoCau()
    {
        if(ChonLinhVuc==5)
        {
            ChonLinhVuc=1;
            Intent intent = new Intent(this,ChonLinhVucActivity.class);
            startActivity(intent);
        }
        else {
            finish();
            startActivity(getIntent());
            this.ChonLinhVuc++;
            Diem+=500;
            this.mSoCau.setText(Integer.toString(SoCau));
        }
        this.SoCau++;
    }
    public  void ResetDiem()
    {
        this.Diem=0;
        this.SoCau=1;
    }

    public void CheckCauTraLoiA(View view) {
        btnB.setClickable(false);
        btnC.setClickable(false);
        btnD.setClickable(false);
        btnA.setBackgroundResource(R.drawable.custom_button_xanh_la);

        this.CauTraLoi = btnA.getText().toString();
        if (this.kq.equalsIgnoreCase(CauTraLoi))
        {
           TangSoCau();
           StopTime();
        }
        else
        {
            ResetDiem();
            //hien thi cau dung
            if(this.kq.equalsIgnoreCase(btnB.getText().toString()))
            {
                btnB.setBackgroundResource(R.drawable.custom_button_cam);
            }
            else if(this.kq.equalsIgnoreCase(btnC.getText().toString()))
            {
                btnC.setBackgroundResource(R.drawable.custom_button_cam);
            }
            else
            {
                btnD.setBackgroundResource(R.drawable.custom_button_cam);
            }
            StopTime();
            CauSai++;
            LuotChoi(CauSai);
        }
    }

    public void CheckCauTraLoiB(View view) {
        btnC.setClickable(false);
        btnD.setClickable(false);
        btnA.setClickable(false);
        btnB.setBackgroundResource(R.drawable.custom_button_xanh_la);
        this.CauTraLoi=btnB.getText().toString();
        if(this.kq.equalsIgnoreCase(CauTraLoi))
        {
            TangSoCau();
            StopTime();
        }
        else
        {
            ResetDiem();
            if(this.kq.equalsIgnoreCase(btnA.getText().toString()))
            {
                btnA.setBackgroundResource(R.drawable.custom_button_cam);
            }
            else if(this.kq.equalsIgnoreCase(btnC.getText().toString()))
            {
                btnC.setBackgroundResource(R.drawable.custom_button_cam);
            }
            else
            {
                btnD.setBackgroundResource(R.drawable.custom_button_cam);
            }

            this.CauSai++;
            LuotChoi(CauSai);
            StopTime();
        }
    }

    public void CheckCauTraLoiC(View view) {
        btnA.setClickable(false);
        btnB.setClickable(false);
        btnD.setClickable(false);

        btnC.setBackgroundResource(R.drawable.custom_button_xanh_la);
        this.CauTraLoi=btnC.getText().toString();
        if(this.kq.equalsIgnoreCase(CauTraLoi))
        {
            TangSoCau();
        }
        else
        {
            ResetDiem();
            if(this.kq.equalsIgnoreCase(btnA.getText().toString()))
            {
                btnA.setBackgroundResource(R.drawable.custom_button_cam);
            }
            else if(this.kq.equalsIgnoreCase(btnB.getText().toString()))
            {
                btnB.setBackgroundResource(R.drawable.custom_button_cam);
            }
            else
            {
                btnD.setBackgroundResource(R.drawable.custom_button_cam);
            }
            this.CauSai++;
            LuotChoi(CauSai);
            StopTime();
        }
    }

    public void CheckCauTraLoiD(View view) {
        btnA.setClickable(false);
        btnB.setClickable(false);
        btnC.setClickable(false);
        btnD.setBackgroundResource(R.drawable.custom_button_xanh_la);
        this.CauTraLoi=btnD.getText().toString();
        if(this.kq.equalsIgnoreCase(CauTraLoi))
        {
            TangSoCau();
        }
        else
        {
            ResetDiem();

            if(this.kq.equalsIgnoreCase(btnA.getText().toString()))
            {
                btnA.setBackgroundResource(R.drawable.custom_button_cam);
            }
            else if(this.kq.equalsIgnoreCase(btnB.getText().toString()))
            {
                btnB.setBackgroundResource(R.drawable.custom_button_cam);
            }
            else
            {
                btnC.setBackgroundResource(R.drawable.custom_button_cam);
            }
            this.CauSai++;
            LuotChoi(CauSai);
            StopTime();
        }
    }
}
