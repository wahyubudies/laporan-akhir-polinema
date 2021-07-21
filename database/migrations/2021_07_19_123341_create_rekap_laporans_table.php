<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_laporans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('dosen_pembimbing_1');
            $table->string('dosen_pembimbing_2');
            $table->string('link_drive')->nullable();
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
        Schema::dropIfExists('rekap_laporans');
    }
}
