<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRupPenyediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rup_penyedias', function (Blueprint $table) {
            $table->id();
            $table->string('mak')->nullable();
            $table->string('kdli')->nullable();
            $table->string('tkdn')->nullable();
            $table->string('umkm')->nullable();
            $table->string('jenis')->nullable();
            $table->string('volume')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('program')->nullable();
            $table->string('pradipa')->nullable();
            $table->string('nip_ppk')->nullable();
            $table->string('nip_kpa')->nullable();
            $table->string('kode_rup')->nullable();
            $table->string('kegiatan')->nullable();
            $table->bigInteger('pagu_rup')->nullable();
            $table->string('nama_kpa')->nullable();
            $table->string('nama_ppk')->nullable();
            $table->string('kode_kldi')->nullable();
            $table->string('id_satker')->nullable();
            $table->string('id_client')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('nama_paket')->nullable();
            $table->string('nama_satker')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('spesifikasi')->nullable();
            $table->string('id_swkelola')->nullable();
            $table->string('status_aktif')->nullable();
            $table->string('detail_lokasi')->nullable();
            $table->date('awal_pengadaan')->nullable();
            $table->date('awal_pekerjaan')->nullable();
            $table->string('status_umumkan')->nullable();
            $table->string('jenis_pengadaan')->nullable();
            $table->date('akhir_pengadaan')->nullable();
            $table->date('akhir_pekerjaan')->nullable();
            $table->string('kode_satker_asli')->nullable();
            $table->string('metode_pemilihan')->nullable();
            $table->date('tanggal_kebutuhan')->nullable();
            $table->string('kode_string_program')->nullable();
            $table->string('kode_string_kegiatan')->nullable();
            $table->string('pagu_perenis_pengadaan')->nullable();
            $table->dateTime('tanggal_terakhir_update', 0)->nullable();
            $table->string('penyedia_didalam_swakelola')->nullable();
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
        Schema::dropIfExists('rup_penyedias');
    }
}
