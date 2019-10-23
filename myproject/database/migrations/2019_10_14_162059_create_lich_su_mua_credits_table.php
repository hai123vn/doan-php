<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichSuMuaCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_su_mua_credits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nguoi_choi_id');
            $table->foreign('nguoi_choi_id')->references('id')->on('nguoi_chois');
            $table->integer('goi_credit_id');
            $table->foreign('goi_credit_id')->references('credit')->on('nguoi_chois');
            $table->foreign('goi_credit_id')->references('credit')->on('goi_credits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lich_su_mua_credits');
    }
}
