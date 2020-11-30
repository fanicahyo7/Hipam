<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->bigInteger('id_tagihan',true,true);
            $table->integer('id_user');
            $table->string('bulan');
            $table->string('tahun');
            $table->integer('metersekarang');
            $table->integer('metersebelumnya');
            $table->integer('pakai');
            $table->integer('tarif1');
            $table->integer('totaltarif1');
            $table->integer('tarif2');
            $table->integer('totaltarif2');
            $table->integer('abonemen');
            $table->integer('totalabonemen');
            $table->integer('kompensasi');
            $table->integer('totalkompensasi');
            $table->integer('rekeningpakaiair');
            $table->integer('denda');
            $table->integer('totaltagihan');
            $table->boolean('status');
            $table->string('user_entry');
            $table->string('user_update')->nullable();
            $table->string('user_delete')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(array('id_tagihan', 'id_user', 'bulan','tahun'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihans');
    }
}
