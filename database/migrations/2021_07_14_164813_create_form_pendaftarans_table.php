<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nim_mhs_1');
            $table->string('nama_mhs_1');
            $table->string('nim_mhs_2')->nullable();
            $table->string('nama_mhs_2')->nullable();
            $table->string('judul');
            $table->string('dosen_penyeleksi_1');
            $table->string('dosen_penyeleksi_2')->nullable();
            $table->string('dosen_penyeleksi_3')->nullable();
            $table->string('file_upload');
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
        Schema::dropIfExists('form_pendaftarans');
    }
}
