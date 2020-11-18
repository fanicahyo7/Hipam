<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetribusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retribusis', function (Blueprint $table) {
            $table->bigIncrements('id_retribusi');
            $table->string('retribusi_name');
            $table->integer('id_rw');

            $table->string('user_entry');
            $table->string('user_update')->nullable();
            $table->string('user_delete')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('retribusis');
    }
}
