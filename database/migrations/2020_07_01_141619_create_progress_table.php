<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('ocid');
            $table->integer('kd_satker');
            $table->string('nama_paket');
            $table->string('images');
            $table->string('tahun_anggaran');
            $table->string('persentase');
            $table->string('keterangan');
            $table->string('tanggal');
            $table->string('status');
            $table->string('uploader');
            $table->string('anonim');
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
        Schema::dropIfExists('progress');
    }
}
