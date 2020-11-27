<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rws', function (Blueprint $table) {
            $table->integer('id_rw');
            $table->integer('id_retribusi');
            $table->string('user_entry');
            $table->string('user_update')->nullable();
            $table->string('user_delete')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->primary('id_rw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rws');
    }
}
