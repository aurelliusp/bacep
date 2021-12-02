<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other', function (Blueprint $table) {
            $table->id('other_id');
            $table->string('other_work');
            $table->string('val_from', 20);
            $table->string('val_to', 20);
            $table->boolean('server', false)->nullable();
            $table->boolean('genset', false)->nullable();
            $table->boolean('mmr1', false)->nullable();
            $table->boolean('mmr2', false)->nullable();
            $table->boolean('fss', false)->nullable();
            $table->boolean('batre', false)->nullable();
            $table->boolean('ups', false)->nullable();
            $table->boolean('lt2', false)->nullable();
            $table->boolean('lt3', false)->nullable();
            $table->boolean('trafo', false)->nullable();
            $table->boolean('parking', false)->nullable();
            $table->boolean('yard', false)->nullable();
            $table->boolean('panel', false)->nullable();
            $table->string('other')->nullable();
            $table->timeTz('time_1');
            $table->timeTz('time_2');
            $table->timeTz('time_3')->nullable();
            $table->timeTz('time_4')->nullable();
            $table->timeTz('time_5')->nullable();
            $table->string('item_1');
            $table->string('item_2');
            $table->string('item_3')->nullable();
            $table->string('item_4')->nullable();
            $table->string('item_5')->nullable();
            $table->string('procedure_1');
            $table->string('procedure_2');
            $table->string('procedure_3')->nullable();
            $table->string('procedure_4')->nullable();
            $table->string('procedure_5')->nullable();
            $table->string('risk_1');
            $table->string('risk_2');
            $table->string('risk_3')->nullable();
            $table->string('risk_4')->nullable();
            $table->string('risk_5')->nullable();
            $table->string('poss_1');
            $table->string('poss_2');
            $table->string('poss_3')->nullable();
            $table->string('poss_4')->nullable();
            $table->string('poss_5')->nullable();
            $table->string('impact_1', 6);
            $table->string('impact_2', 6);
            $table->string('impact_3', 6)->nullable();
            $table->string('impact_4', 6)->nullable();
            $table->string('impact_5', 6)->nullable();
            $table->string('mitigation_1');
            $table->string('mitigation_2');
            $table->string('mitigation_3')->nullable();
            $table->string('mitigation_4')->nullable();
            $table->string('mitigation_5')->nullable();
            $table->string('desc');
            $table->string('testing')->nullable();
            $table->string('rollback')->nullable();
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
        Schema::dropIfExists('other');
    }
}
