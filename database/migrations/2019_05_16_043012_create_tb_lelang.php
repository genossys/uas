<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbLelang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lelang', function (Blueprint $table) {
            $table->string('idLelang', '10')->primary();
            $table->string('kdLelang','25');
            $table->string('namaLelang','255');
            $table->string('password', '255');
            $table->text('link');
            $table->string('urlPenawaran','255');
            $table->string('urlTeknis','255');
            $table->string('urlKualifikasi','255');
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
        Schema::dropIfExists('tb_lelang');
    }
}
