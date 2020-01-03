package com.example.traloicauhoi;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

public class LichSuDBHelper extends SQLiteOpenHelper {
    private static String DB_NAME="Do_an.db";
    public LichSuDBHelper(@Nullable Context context) {
        super(context, DB_NAME, null, 1);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(LichSuEntry.TAO_BANG);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL(LichSuEntry.XOA_BANG);
    }
}
