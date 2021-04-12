<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relawan', function (Blueprint $table) {
            $table->char('id_relawan',10)->primary();
            $table->string('nama_relawan');
            $table->enum('jenis_kealmin', ['laki-laki', 'perempuan']);
            $table->text('alamat');
            $table->char('gol_darah',5);
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
        Schema::dropIfExists('relawan');
    }
}
