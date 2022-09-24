<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageFaqItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_faq_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default('500');
            $table->integer('active')->default('1');
            $table->integer('faq_id');
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_faq_items');
    }
}
