<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_logbooks', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('dospem1');
            $table->string('qrcode_dospem1')->nullable();
            $table->string('dospem2');
            $table->string('qrcode_dospem2')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('data_logbooks');
    }
}
