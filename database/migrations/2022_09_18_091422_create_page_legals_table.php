<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageLegalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_legals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meta_title')->default('500');
            $table->string('meta_description')->default('1');
            $table->string('slug')->nullable();
            $table->integer('order')->nullable();
            $table->integer('active')->nullable();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('page_legals');
    }
}
