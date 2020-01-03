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
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
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

import java.text.SimpleDateFormat;
import java.util.Calendar;

public class TraLoiCauHoiActivity<countDownTimer> extends AppCompatActivity implements LoaderManager.LoaderCallbacks<String> {

    public TextView mNoiDung,mSoCau,mDiem,mTime,mCredit;
    public ImageView mImg1,mImg2,mImg3,mImg4,mImg5;
    private Button btnA;
    private Button btnB;
    private Button btnC;
    private Button btnD;
    private Button btnLoaiDASai;
    private int mID;
    private static int SoCau=1,CauSai=0;
    private static int ChonLinhVuc=1;
    private static int Diem=0;
    private String kq="",CauTraLoi="",credit;
    private CountDownTimer countDownTimer;

    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;

    private static final String FILE_NAME_SHAREREF = "com.example.traloicauhoi";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tra_loi_cau_hoi);

        sharedPreferences = getSharedPreferences(FILE_NAME_SHAREREF, MODE_PRIVATE);
        editor = sharedPreferences.edit();

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
        this.mCredit=findViewById(R.id.textCredit);
        if (getSupportLoaderManager().getLoader(0) != null)
        {
            getSupportLoaderManager().initLoader(0, null, this);
        }
        getSupportLoaderManager().restartLoader(0, null, this);

        StarTime();
        this.credit=sharedPreferences.getString("CREDIT","");
        if(CauSai>0)
        {
            LuotChoi(CauSai);
        }


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
          this.mSoCau.setText(Integer.toString(sharedPreferences.getInt("SoCau",1)));
          this.mDiem.setText(Integer.toString(sharedPreferences.getInt("DIEM",1)));
          this.mNoiDung.setText(json.getString("noi_dung"));
          this.btnA.setText(json.getString("phuong_an_a"));
          this.btnB.setText(json.getString("phuong_an_b"));
          this.btnC.setText(json.getString("phuong_an_c"));
          this.btnD.setText(json.getString("phuong_an_d"));

          this.mCredit.setText(credit);


      }catch (Exception e)
      {
          e.printStackTrace();
      }
    }

    //diem nguoc time
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
        if(cauSai==1) {

            mImg5.setVisibility(View.INVISIBLE);
        }
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
            taoThongBao("Thông báo","Bạn Đã Thua Cuộc").show();
            ResetDiem();
            StopTime();
            this.CauSai=0;
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
        editor.putInt("DIEM",Diem);
        editor.commit();
        editor.putInt("SoCau",SoCau);
        editor.commit();

    }
    public  void ResetDiem()
    {
        this.Diem=0;
        this.SoCau=1;


    }

    public void CheckCauTraLoiA(View view) {
        btnA.setEnabled(false);
        btnB.setEnabled(false);
        btnC.setEnabled(false);
        btnD.setEnabled(false);
        btnA.setBackgroundResource(R.drawable.custom_button_xanh_la);

        this.CauTraLoi = btnA.getText().toString();
        if (this.kq.equalsIgnoreCase(CauTraLoi))
        {
           TangSoCau();
           StopTime();
        }
        else
        {
            if(CauSai==5) {
                taoThongBao("Thông báo","Bạn Đã Thua Cuộc").show();
            }
            //hien thi cau dung
            else {
                if (this.kq.equalsIgnoreCase(btnB.getText().toString())) {
                    btnB.setBackgroundResource(R.drawable.custom_button_cam);
                } else if (this.kq.equalsIgnoreCase(btnC.getText().toString())) {
                    btnC.setBackgroundResource(R.drawable.custom_button_cam);
                } else {
                    btnD.setBackgroundResource(R.drawable.custom_button_cam);
                }
                finish();
                startActivity(getIntent());
                StopTime();
            }
            this.CauSai++;
        }
    }

    public void CheckCauTraLoiB(View view) {
        btnA.setEnabled(false);
        btnB.setEnabled(false);
        btnC.setEnabled(false);
        btnD.setEnabled(false);
        btnB.setBackgroundResource(R.drawable.custom_button_xanh_la);
        this.CauTraLoi=btnB.getText().toString();
        if(this.kq.equalsIgnoreCase(CauTraLoi))
        {
            TangSoCau();
            StopTime();
        }
        else
        {
            if(CauSai==5)
            {
                taoThongBao("Thông Báo","Bạn Đã Thua Cuộc").show();
            }
            else {
//            ResetDiem();
                if (this.kq.equalsIgnoreCase(btnA.getText().toString())) {
                    btnA.setBackgroundResource(R.drawable.custom_button_cam);
                } else if (this.kq.equalsIgnoreCase(btnC.getText().toString())) {
                    btnC.setBackgroundResource(R.drawable.custom_button_cam);
                } else {
                    btnD.setBackgroundResource(R.drawable.custom_button_cam);
                }
                finish();
                startActivity(getIntent());
                StopTime();
            }
            this.CauSai++;

        }
    }

    public void CheckCauTraLoiC(View view) {
        btnA.setEnabled(false);
        btnB.setEnabled(false);
        btnC.setEnabled(false);
        btnD.setEnabled(false);

        btnC.setBackgroundResource(R.drawable.custom_button_xanh_la);
        this.CauTraLoi=btnC.getText().toString();
        if(this.kq.equalsIgnoreCase(CauTraLoi))
        {
            TangSoCau();
            StopTime();
        }
        else
        {
            if(CauSai==5) {
                taoThongBao("Thông báo","Bạn Đã Thua Cuộc").show();
            }
            else {
                if (this.kq.equalsIgnoreCase(btnA.getText().toString())) {
                    btnA.setBackgroundResource(R.drawable.custom_button_cam);
                } else if (this.kq.equalsIgnoreCase(btnB.getText().toString())) {
                    btnB.setBackgroundResource(R.drawable.custom_button_cam);
                } else {
                    btnD.setBackgroundResource(R.drawable.custom_button_cam);
                }
                finish();
                startActivity(getIntent());
                StopTime();
            }
            this.CauSai++;

        }
    }

    public void CheckCauTraLoiD(View view) {
        btnA.setEnabled(false);
        btnB.setEnabled(false);
        btnC.setEnabled(false);
        btnD.setEnabled(false);
        btnD.setBackgroundResource(R.drawable.custom_button_xanh_la);
        this.CauTraLoi=btnD.getText().toString();
        if(this.kq.equalsIgnoreCase(CauTraLoi))
        {
            TangSoCau();
            StopTime();
        }
        else
        {
//            ResetDiem();
            if(CauSai==5) {
                taoThongBao("Thông báo","Bạn Đã Thua Cuộc").show();
            }
            else {
                if (this.kq.equalsIgnoreCase(btnA.getText().toString())) {
                    btnA.setBackgroundResource(R.drawable.custom_button_cam);
                } else if (this.kq.equalsIgnoreCase(btnB.getText().toString())) {
                    btnB.setBackgroundResource(R.drawable.custom_button_cam);
                } else {
                    btnC.setBackgroundResource(R.drawable.custom_button_cam);
                }
                finish();
                startActivity(getIntent());
                StopTime();
            }
            this.CauSai++;
        }
    }
    public AlertDialog taoThongBao(String tieuDe, String thongBao) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setMessage(thongBao).setTitle(tieuDe);
        builder.setCancelable(false);
        builder.setPositiveButton("Đồng ý", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                ResetDiem();
                Calendar calendar = Calendar.getInstance();
                SimpleDateFormat dinhDangNgay= new SimpleDateFormat("dd/MM/yyyy");
                SimpleDateFormat dinhDangGio= new SimpleDateFormat("HH:mm:ss a");
                String tentk=sharedPreferences.getString("HOTEN","");
                String ngaychoi=dinhDangNgay.format(calendar.getTime())+" "+dinhDangGio.format(calendar.getTime());//ngay + gio
                String diemso=Integer.toString(sharedPreferences.getInt("DIEM",1))+" Điểm";
                String socau=String.valueOf(sharedPreferences.getInt("SoCau",1));
                LichSuEntry lichSuEntry = new LichSuEntry(TraLoiCauHoiActivity.this,tentk,ngaychoi,diemso,socau);
                lichSuEntry.themLichSu();
//                if(kq>0)
//                {
//                    Toast.makeText(TraLoiCauHoiActivity.this,"Thêm số điện thoại thành công",Toast.LENGTH_SHORT).show();
//
//                }
//                else
//                {
//                    Toast.makeText(TraLoiCauHoiActivity.this,"Thêm số điện thoại thất bại",Toast.LENGTH_SHORT).show();
//                }
                Intent intent = new Intent(TraLoiCauHoiActivity.this,ManHinhChinhActivity.class);
                startActivity(intent);

            }
        });
        return builder.create();
    }
}
