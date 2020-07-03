<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspirasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id();
            $table->string('id_sub');
            $table->string('tahap');
            $table->string('ocid');
            $table->string('kd_satker');
            $table->string('pengirim');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('isi');
            $table->string('nik');
            $table->string('foto');
            $table->string('jenis_kelamin');
            $table->string('tanggal');
            $table->string('tahun_anggaran');
            $table->string('status');
            $table->string('keterangan');
            $table->string('aktif');
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
        Schema::dropIfExists('aspirasis');
    }
}
