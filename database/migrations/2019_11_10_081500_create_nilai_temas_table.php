<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_temas', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('idKelas');
            $table->integer('tema');
            $table->string('mataPelajaran');
            $table->integer('nilaiKetrampilan');
            $table->integer('nilaiPengetahuan');
            $table->integer('nilaiSikap');
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
        Schema::dropIfExists('nilai_temas');
    }
}
