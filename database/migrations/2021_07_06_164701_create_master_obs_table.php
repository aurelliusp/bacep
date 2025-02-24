<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterObsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_obs', function (Blueprint $table) {
            $table->id('ob_id');
            $table->string('nama');
            $table->string('id_number')->unique();
            $table->string('phone_number')->unique();
            $table->string('pt');
            $table->string('responsible');
            $table->string('department');
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
        Schema::dropIfExists('master_obs');
    }
}
