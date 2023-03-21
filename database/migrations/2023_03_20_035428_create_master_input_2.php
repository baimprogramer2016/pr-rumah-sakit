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
        Schema::create('master_input_2', function (Blueprint $table) {
            $table->id();
            $table->float('tahun');
            $table->string('kode');
            $table->integer('kategori_input_id')->nullable();
            $table->text('key_performance')->nullable();
            $table->text('numerator')->nullable();
            $table->text('denominator')->nullable();
            $table->text('target_condition')->nullable();
            $table->float('target')->nullable();
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
        Schema::dropIfExists('master_input_2');
    }
};
