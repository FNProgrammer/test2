<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculators', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts')->cascadeOnUpdate();
            $table->bigInteger('rent_money')->unsigned();
            $table->bigInteger('Compensatory_money')->unsigned();
            $table->bigInteger('money')->unsigned();
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
        Schema::dropIfExists('calculators');
    }
}
