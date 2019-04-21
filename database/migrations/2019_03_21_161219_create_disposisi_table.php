<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisposisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('surat_id')->unsigned();
            $table->string('sifat')->nullable();
            $table->string('catatan')->nullable();
            $table->string('ttd_kasubbag')->nullable();
            $table->string('ttd_sekretaris')->nullable();
            $table->string('ttd_kaban')->nullable();
            $table->enum('status', ['0', '1', '2', '3', '4']);
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
        Schema::dropIfExists('disposisi');
    }
}
