package com.example.traloicauhoi;

import android.content.Context;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.loader.content.AsyncTaskLoader;

public class TraLoiCauHoiLoader extends AsyncTaskLoader<String> {
    protected int id;
    public TraLoiCauHoiLoader(@NonNull Context context,int id) {
        super(context);
        this.id = id;
    }

    @Nullable
    @Override
    public String loadInBackground() {
        //truyền link vào
        return NetworkUtils.getJSONData("cau-hoi?linh_vuc=" + this.id,"GET");
    }

    @Override
    protected void onStartLoading() {
        super.onStartLoading();
        forceLoad();
    }
}
