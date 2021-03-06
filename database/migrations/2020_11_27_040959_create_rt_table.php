<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rts', function (Blueprint $table) {
            $table->integer('id_rt');
            $table->integer('id_rw');
            $table->string('user_entry');
            $table->string('user_update')->nullable();
            $table->string('user_delete')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary(['id_rt', 'id_rw']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rts');
    }
}
