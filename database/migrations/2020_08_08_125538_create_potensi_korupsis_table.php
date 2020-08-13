<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotensiKorupsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potensi_korupsis', function (Blueprint $table) {
            $table->id();
            $table->string('id_tender');
            $table->string('ocid')->nullable();
            $table->string('tahun');
            $table->string('nkt')->nullable();
            $table->string('p')->nullable();
            $table->string('s')->nullable();
            $table->string('q')->nullable();
            $table->string('w')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('potensi_korupsis');
    }
}
