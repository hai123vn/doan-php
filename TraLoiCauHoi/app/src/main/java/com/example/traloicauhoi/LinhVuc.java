package com.example.traloicauhoi;

public class LinhVuc {
    private int id;
    private String ten_linh_vuc;

    public LinhVuc()
    {
        this.id=1;
        this.ten_linh_vuc="";
    }
    public LinhVuc(int id,String linhvuc)
    {
        this.id=id;
        this.ten_linh_vuc=linhvuc;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTen_linh_vuc() {
        return ten_linh_vuc;
    }

    public void setTen_linh_vuc(String ten_linh_vuc) {
        this.ten_linh_vuc = ten_linh_vuc;
    }
}
