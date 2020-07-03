<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rups', function (Blueprint $table) {            
            $table->id();
            $table->string('id_rup');
            $table->string('mak');
            $table->string('nama_paket');
            $table->string('aktif');
            $table->string('lokasi');
            $table->string('volume');
            $table->string('umumkan');
            $table->string('kegiatan');
            $table->bigInteger('pagu_mak');
            $table->string('id_satker');
            $table->string('asal_dana');
            $table->string('deskripsi');
            $table->string('id_program');
            $table->string('metode_str');
            $table->bigInteger('total_pagu');
            $table->string('nama_satker');
            $table->string('id_kegiatan');
            $table->string('nama_program');
            $table->string('create_rup');
            $table->string('sumber_dana');
            $table->string('status_tdkn');
            $table->integer('id_swakelola')->nullable();
            $table->integer('jenis_belanja');
            $table->integer('kode_kegiatan');
            $table->integer('status_pradipa');
            $table->integer('jenis_pengadaan');
            $table->string('lokasi_pekerjaan');
            $table->string('last_update_rup');
            $table->string('asal_dana_satker');
            $table->string('jenis_pengadaan_str');
            $table->string('sumber_dana_str');
            $table->date('tanggal_awal_pengadaan');
            $table->date('tanggal_awal_pengerjaan');
            $table->date('tanggal_akhir_pengadaan');
            $table->date('tanggal_akhir_pengerjaan');
            $table->string('metode_pengadaan');
            $table->date('tahun');
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
        Schema::dropIfExists('rups');
    }
}
