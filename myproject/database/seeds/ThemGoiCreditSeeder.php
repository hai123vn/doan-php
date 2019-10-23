<?php

use Illuminate\Database\Seeder;
use App\GoiCredit;

class ThemGoiCreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goi_credits')->insert([
        	['ten_goi' => 'Gói A', 'credit' => 100, 'so_tien' => 50000],
        	['ten_goi' => 'Gói B', 'credit' => 200, 'so_tien' => 90000],
        	['ten_goi' => 'Gói C', 'credit' => 300, 'so_tien' => 130000],
        ]);
    }
}
