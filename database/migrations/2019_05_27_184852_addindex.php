<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addindex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->foreign('idLelang', 'idlelangjadwalifk')->references('idLelang')->on('tb_lelang')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('tb_tahapan', function (Blueprint $table) {
            $table->foreign('idLelang', 'idlelangtahapanifk')->references('idLelang')->on('tb_lelang')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table( 'tb_jadwal', function (Blueprint $table) {
            $table->dropForeign( 'idlelangjadwalifk');
        });

        Schema::table( 'tb_tahapan', function (Blueprint $table) {
            $table->dropForeign( 'idlelangtahapanifk');
        });
    }
}
