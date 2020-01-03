<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAkhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_akhirs', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('idKelas');
            $table->string('mataPelajaran');
            $table->integer('nilaiKetrampilan');
            $table->integer('nilaiPengetahuan');
            $table->integer('nilaiSikap');
            $table->string('saran');
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
        Schema::dropIfExists('nilai_akhirs');
    }
}
