<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block-offices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default('500');
            $table->integer('active')->default('1');
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('schedule')->nullable();
            $table->string('email')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
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
        Schema::dropIfExists('block-offices');
    }
}
