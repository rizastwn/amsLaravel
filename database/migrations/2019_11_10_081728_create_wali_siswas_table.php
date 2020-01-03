<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_siswas', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('idSiswa');
            $table->string('jenis');
            $table->string('nama');
            $table->string('alamat');
            $table->string('noTelpon');
            $table->string('fotoOrangtua');
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
        Schema::dropIfExists('wali_siswas');
    }
}
