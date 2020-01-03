package com.example.traloicauhoi;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.util.ArrayList;

public class LichSuEntry {
    public static final String TABLE_NAME="lich_su";
    public static final String COL_ID="id";
    public static final String COL_TEN="ten_tk";
    public static final String COL_NGAYCHOI="ngay_choi";
    public static final String COL_DIEM="diem_so";
    public static final String COL_SOCAU="so_cau";

    public static final String TAO_BANG="CREATE TABLE " +TABLE_NAME+ "("
            +COL_ID+ " INTEGER PRIMARY KEY,"
            +COL_TEN+ " TEXT,"
            +COL_NGAYCHOI+" TEXT,"
            +COL_DIEM+" TEXT,"
            +COL_SOCAU+" TEXT)";
    public static final String XOA_BANG="DROP TABLE IF EXIST "+TABLE_NAME;

    private long id;
    private String ten;
    private String ngay_choi;
    private String diemso;
    private String socau;
    private Context context;
    private LichSuDBHelper lichSuDBHelper;

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getTen() {
        return ten;
    }

    public void setTen(String ten) {
        this.ten = ten;
    }

    public String getNgay_choi() {
        return ngay_choi;
    }

    public void setNgay_choi(String ngay_choi) {
        this.ngay_choi = ngay_choi;
    }

    public String getDiemso() {
        return diemso;
    }

    public void setDiemso(String diemso) {
        this.diemso = diemso;
    }

    public String getSocau() {
        return socau;
    }

    public void setSocau(String socau) {
        this.socau = socau;
    }
    public LichSuEntry(Context context)
    {
        this.context=context;
        lichSuDBHelper = new LichSuDBHelper(this.context);
    }
    public LichSuEntry(Context context,String ten,String ngaychoi,String diemso,String socau)
    {
        this(context);
        this.ten=ten;
        this.ngay_choi=ngaychoi;
        this.diemso=diemso;
        this.socau=socau;
    }
    public LichSuEntry()
    {
        this.id=0;
        this.ten="";
        this.ngay_choi="";
        this.diemso="";
        this.socau="";
    }
    private LichSuEntry(String ngaychoi,String diemso,String socau)
    {
        this.ngay_choi=ngaychoi;
        this.diemso=diemso;
        this.socau=socau;
    }
    private LichSuEntry(String ten,String ngaychoi,String diemso,String socau)
    {
        this.ngay_choi=ngaychoi;
        this.diemso=diemso;
        this.socau=socau;
    }

    public long themLichSu()
    {
        SQLiteDatabase sqLiteDatabase = lichSuDBHelper.getWritableDatabase();

        ContentValues contentValues = new ContentValues();
        contentValues.put(COL_TEN,this.ten);
        contentValues.put(COL_NGAYCHOI,this.ngay_choi);
        contentValues.put(COL_DIEM,this.diemso);
        contentValues.put(COL_SOCAU,this.socau);

        return sqLiteDatabase.insert(TABLE_NAME,null,contentValues);
    }

    public ArrayList<LichSuEntry> dsLichSu(String ten)
    {
        ArrayList<LichSuEntry> listLichSu= new ArrayList<>();
        SQLiteDatabase sqLiteDatabase = lichSuDBHelper.getReadableDatabase();
        String where= COL_TEN+" =?";
        String[] param = {ten};
        Cursor cursor = sqLiteDatabase.query(TABLE_NAME,null,where,param,null,null,null);
        while (cursor.moveToNext())
        {
            String ngaychoi = cursor.getString(cursor.getColumnIndexOrThrow(COL_NGAYCHOI));
            String diemso = cursor.getString(cursor.getColumnIndexOrThrow(COL_DIEM));
            String socau = cursor.getString(cursor.getColumnIndexOrThrow(COL_SOCAU));
            LichSuEntry lichSuEntry = new LichSuEntry(ten,ngaychoi,diemso,socau);
            listLichSu.add(lichSuEntry);
        }
        return listLichSu;
    }
}
