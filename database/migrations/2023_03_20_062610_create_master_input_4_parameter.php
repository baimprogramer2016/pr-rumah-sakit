<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_input_4_parameter', function (Blueprint $table) {
            $table->id();
            $table->float('tahun');
            $table->string('pasien_id');
            $table->string('pasien');
            $table->float('bpjs');
            $table->float('tunai');
            $table->float('kredit');
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
        Schema::dropIfExists('master_input_4_parameter');
    }
};
