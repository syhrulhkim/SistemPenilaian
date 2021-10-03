<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi', function (Blueprint $table) {
            $table->id();

            $table->string('fungsi');
            $table->string('objektif');
            $table->string('bukti');
            $table->string('peratus');
            $table->string('ukuran');
            $table->string('threshold');
            $table->string('base');
            $table->string('stretch');
            $table->string('pencapaian');
            $table->string('skor_KPI');
            $table->string('skor_sebenar');

            $table->string('grade');
            $table->string('total_score');
            $table->string('weightage');
            
            $table->string('user_id');
            $table->timestamps();
            $table->string('tahun')->nullable();
            $table->string('bulan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpi');
    }
}
