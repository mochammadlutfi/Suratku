<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_indeks', 30);
            $table->string('nomor');
            $table->date('tgl_surat');
            $table->string('perihal');
            $table->string('dari');
            $table->string('kepada');
            $table->string('keterangan');
            $table->string('media');
            $table->string('sifat_surat');
            $table->integer('penerima')->unsigned();
            $table->timestamps();
            $table->foreign('penerima')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('files_keluar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('keluar_id')->unsigned();
            $table->string('path');
            $table->timestamps();
            $table->foreign('keluar_id')->references('id')->on('surat_masuk')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluar');
        Schema::dropIfExists('files_keluar');
    }
}
