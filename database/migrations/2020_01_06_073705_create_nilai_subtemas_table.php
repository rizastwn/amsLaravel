<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSubtemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_subtemas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idKelas');
            $table->integer('tema');
            $table->integer('subtema');
            $table->string('mataPelajaran');
            $table->string('jenis');
            $table->string('fotoHasil');
            $table->string('deskripsi');
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
        Schema::dropIfExists('nilai_subtemas');
    }
}
