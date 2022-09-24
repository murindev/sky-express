<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default('500');
            $table->integer('active')->default('1');
            $table->string('slug');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('title');
            $table->string('content');
            $table->string('image');
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
        Schema::dropIfExists('page_actions');
    }
}
