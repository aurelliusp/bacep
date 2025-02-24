<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_uses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id');
            $table->string('nama_barang');
            $table->unsignedInteger('jumlah');
            $table->text('ket')->nullable();
            $table->string('pencatat');
            $table->string('tanggal');
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
        Schema::dropIfExists('asset_uses');
    }
}
