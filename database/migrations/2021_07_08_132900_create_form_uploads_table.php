<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('nim_mhs_1');
            $table->string('nama_mhs_1');
            $table->string('nim_mhs_2');
            $table->string('nama_mhs_2');
            $table->string('judul');
            $table->string('dosen_pmb_1');
            $table->string('dosen_pmb_2');
            $table->string('dosen_pgj_1');
            $table->string('dosen_pgj_2');
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
        Schema::dropIfExists('form_uploads');
    }
}
