<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kecekapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecekapan', function (Blueprint $table) {
            $table->id();

            $table->string('kecekapan_teras');
            $table->string('jangkaan_hasil');
            $table->string('peratus');
            $table->string('ukuran');
            $table->string('skor_pekerja');
            $table->string('skor_penyelia');
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
        Schema::dropIfExists('kecekapan');
    }
}