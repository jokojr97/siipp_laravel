<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpseScrapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lpse_scraps', function (Blueprint $table) {
            $table->id();
            $table->string('kode_lelang');
            $table->string('nama_paket');
            $table->string('id_rup');
            $table->string('nama_rup');
            $table->string('sumber_dana');
            $table->string('tanggal_pembuatan');
            $table->string('lingkup_pekerjaan');
            $table->string('keterangan');
            $table->string('tahap_tender');
            $table->string('instansi');
            $table->string('satker');
            $table->string('kategori');
            $table->string('sistem_pengadaan');
            $table->string('tahun_anggaran');
            $table->string('tahun_ang');
            $table->string('cara_pembayaran');
            $table->string('lokasi');
            $table->string('kualifikasi_usaha');
            $table->string('peserta');
            $table->string('nama_pemenang');
            $table->string('alamat_pemenang');
            $table->string('npwp_pemenang');
            $table->string('harga_penawaran');
            $table->string('harga_terkoreksi');
            $table->string('hasil_negosiasi');
            $table->string('pagu');
            $table->string('hps');
            $table->string('nama_kontraktor');
            $table->string('penawaran_kontraktor');
            $table->string('negosiasi_kontraktor');
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
        Schema::dropIfExists('lpse_scraps');
    }
}
