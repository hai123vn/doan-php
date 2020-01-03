package com.example.traloicauhoi;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

public class LichSuAdapter extends RecyclerView.Adapter<LichSuAdapter.LichSuViewHolder> {
    private ArrayList<LichSuEntry> listLichSu;
    private LayoutInflater inflater;
    private Context context;
    public  LichSuAdapter(Context context,ArrayList<LichSuEntry> listLichSu)
    {
        this.inflater=LayoutInflater.from(context);
        this.context=context;
        this.listLichSu=listLichSu;
    }
    @NonNull
    @Override
    public LichSuViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View itemView = inflater.inflate(R.layout.loading_lich_su,parent,false);//
        return new LichSuViewHolder(itemView,this);
    }

    @Override
    public void onBindViewHolder(@NonNull LichSuViewHolder holder, int position) {
        LichSuEntry lichSuEntry = listLichSu.get(position);
        holder.mNgayChoi.setText(lichSuEntry.getNgay_choi());
        holder.mDiemSo.setText(lichSuEntry.getDiemso());
        holder.mSoCau.setText(lichSuEntry.getSocau());
    }

    @Override
    public int getItemCount() {
        return this.listLichSu.size();
    }

    public class LichSuViewHolder extends RecyclerView.ViewHolder {
        private TextView mNgayChoi,mDiemSo,mSoCau;
        private LichSuAdapter adapter;
        public LichSuViewHolder(@NonNull View itemView,LichSuAdapter adapter) {
            super(itemView);
            this.adapter=adapter;
            mNgayChoi=itemView.findViewById(R.id.txtNgay);
            mDiemSo=itemView.findViewById(R.id.txtDiemXH);
            mSoCau=itemView.findViewById(R.id.txtSoCau);
        }
    }
}
