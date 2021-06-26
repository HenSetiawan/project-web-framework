<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokDarahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_darah', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah_gol_A');
            $table->string('jumlah_gol_AB');
            $table->string('jumlah_gol_B');
            $table->string('jumlah_gol_O');
            $table->string('kategori', 25);
            $table->integer('jumlah_stok');
            $table->text('deskripsi');
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
        Schema::dropIfExists('stok_darah');
    }
}
