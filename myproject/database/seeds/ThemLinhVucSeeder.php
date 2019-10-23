<?php

use Illuminate\Database\Seeder;
use App\LinhVuc;
class ThemLinhVucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LinhVuc::create(['ten_linh_vuc' => 'Âm nhạc']);
        LinhVuc::create(['ten_linh_vuc' => 'Lịch Sử']);
        LinhVuc::create(['ten_linh_vuc' => 'Địa lý']);
    }
}
