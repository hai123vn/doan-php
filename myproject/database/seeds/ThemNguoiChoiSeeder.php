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
            'ten_dang_nhap' => 'trancuong',
            'mat_khau' => Hash::make('123456'),
            'email' => 'abc@gmail.com',
            'hinh_dai_dien' => 'abc.jpg',
            'diem_cao_nhat' => '100',
            'credit' => '200'
        ]);

        App\NguoiChoi::create([
            'ten_dang_nhap' => 'minhhai',
            'mat_khau' => Hash::make('123456'),
            'email' => 'abcd@gmail.com',
            'hinh_dai_dien' => 'abcd.jpg',
            'diem_cao_nhat' => '1001',
            'credit' => '200'
        ]);

        App\NguoiChoi::create([
            'ten_dang_nhap' => 'minhhoang',
            'mat_khau' => Hash::make('123456'),
            'email' => 'abcde@gmail.com',
            'hinh_dai_dien' => 'abcde.jpg',
            'diem_cao_nhat' => '1002',
            'credit' => '200'
        ]);

   //      $count = 1;
   //      while($count < 50) {
			// echo "Them nguoi choi thu " . $count . "\n";
   //      	$tenDangNhap = Str::random(8);
   //      	App\NguoiChoi::create([
   //      		'ten_dang_nhap' => $tenDangNhap,
   //      		'mat_khau'		=> Hash::make(Str::random(6)),
   //      		'email'			=> $tenDangNhap . '@gmail.com',
   //      		'hinh_dai_dien'	=> $tenDangNhap . '.jpg',
   //      		'diem_cao_nhat'	=> rand(1000, 5000),
   //      		'credit'		=> rand(10, 500)
   //      	]);
   //      	$count++;
   //      }
<<<<<<< HEAD

=======
>>>>>>> 99288e4b3611821679b9df7df97b4e59968409e2
    }
}
