<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\QuanTriVien;

class ThemQuanTriVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listQTV = [
        	['ten_dang_nhap' => 'admin1', 'mat_khau' => Hash::make('123456'), 'ho_ten' => 'Quan Tri Vien 1'],
            ['ten_dang_nhap' => 'admin2', 'mat_khau' => Hash::make('abcefg'), 'ho_ten' => 'Quan Tri Vien 2'],
            ['ten_dang_nhap' => 'admin3', 'mat_khau' => Hash::make('qwerty'), 'ho_ten' => 'Quan Tri Vien 3']
        ];

        foreach ($listQTV as $qtv) {
            QuanTriVien::create($qtv);
        }
    }
}
