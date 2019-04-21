<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTujuanDisposisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tujuan_disposisi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('disposisi_id')->unsigned();
            $table->string('role_id');
            $table->timestamps();
            $table->foreign('disposisi_id')->references('id')->on('disposisi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
