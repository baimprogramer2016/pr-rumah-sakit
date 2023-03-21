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
        Schema::create('master_input_4', function (Blueprint $table) {
            $table->id();
            $table->float('tahun');
            $table->string('kode');
            $table->integer('kategori_input_id')->nullable();
            $table->string('pasien_id')->nullable();
            $table->text('uraian')->nullable();
            $table->float('total_bl')->nullable();
            $table->float('bpjs_par')->nullable();
            $table->float('tunai_par')->nullable();
            $table->float('kredit_par')->nullable();
            $table->float('bpjs')->nullable();
            $table->float('tunai')->nullable();
            $table->float('kredit')->nullable();
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
        Schema::dropIfExists('master_input_4');
    }
};
