<?php

use Illuminate\Database\Seeder;

class ThemNguoiChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\NguoiChoi::create([
            'ten_dang_nhap' => 'nc1',
            'mat_khau' => Hash::make('123456'),
            'email' => 'abc@gmail.com',
            'hinh_dai_dien' => 'abc.jpg',
            'diem_cao_nhat' => '100',
            'credit' => '200'
        ]);

        App\NguoiChoi::create([
            'ten_dang_nhap' => 'nc2',
            'mat_khau' => Hash::make('123456'),
            'email' => 'abcd@gmail.com',
            'hinh_dai_dien' => 'abcd.jpg',
            'diem_cao_nhat' => '1001',
            'credit' => '200'
        ]);

        App\NguoiChoi::create([
            'ten_dang_nhap' => 'nc3',
            'mat_khau' => Hash::make('123456'),
            'email' => 'abcde@gmail.com',
            'hinh_dai_dien' => 'abcde.jpg',
            'diem_cao_nhat' => '1002',
            'credit' => '200'
        ]);
    }
}
