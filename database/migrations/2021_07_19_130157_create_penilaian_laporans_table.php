<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_laporans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('dosen_pembimbing_1');
            $table->string('dosen_pembimbing_2');
            $table->string('nilai_dospem_1');
            $table->string('nilai_dospem_2');
            $table->string('dosen_penguji_1');
            $table->string('dosen_penguji_2');
            $table->string('nilai_dospeng_1');
            $table->string('nilai_dospeng_2');
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
        Schema::dropIfExists('penilaian_laporans');
    }
}
