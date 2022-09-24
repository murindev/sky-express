<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockPopDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block-pop-departures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order')->default('500');
            $table->string('active')->default('1');
            $table->string('from');
            $table->string('to');
            $table->string('price');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('block-pop-departures');
    }
}
