<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_lelangs', function (Blueprint $table) {
            $table->id();
            $table->string('kd_lpse');
            $table->string('kd_lelang');
            $table->string('kd_peserta');
            $table->string('penawaran');
            $table->string('npwp');
            $table->string('tgl_pengumuman');
            $table->string('kd_paket');
            $table->string('peserta');
            $table->string('status_upload_dok');
            $table->string('ocid');
            $table->string('ambil_data');
            $table->string('harga_terkoreksi');
            $table->string('metode');
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
        Schema::dropIfExists('peserta_lelangs');
    }
}
