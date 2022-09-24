<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockExpressDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block-express-delivery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default('500');
            $table->integer('active')->default('1');
            $table->text('text');
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('block-express-delivery');
    }
}
