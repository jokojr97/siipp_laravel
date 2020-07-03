<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonTenderScrapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_tender_scraps', function (Blueprint $table) {
            $table->id();
            $table->string('kd_lelang');
            $table->string('nama_paket');
            $table->string('ocid');
            $table->string('tanggal_pembuatan');
            $table->string('keterangan');
            $table->string('id_tahap');
            $table->string('tahap_tender');
            $table->string('instansi');
            $table->string('kd_satker');
            $table->string('satker');
            $table->string('jenis_pekerjaan');
            $table->string('jenis_pekerjaan_str');
            $table->string('metode_pengadaan');
            $table->string('sumber_dana');
            $table->string('tahun_ang');
            $table->string('pagu');
            $table->string('hps');
            $table->string('lokasi');
            $table->string('kualifikasi');
            $table->string('peserta');
            $table->string('npwp_peserta');
            $table->string('harga_penawaran');
            $table->string('harga_terkoreksi');
            $table->string('hasil_negosiasi');
            $table->string('pagu1');
            $table->string('hps1');
            $table->string('pemenang');
            $table->string('paket1');
            $table->string('alamat_pemenang');
            $table->string('npwp_pemenang');
            $table->string('hasil_negosiasi_pemenang');
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
        Schema::dropIfExists('non_tender_scraps');
    }
}
