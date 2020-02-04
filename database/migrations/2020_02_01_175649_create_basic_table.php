<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location',300);
        });
        Schema::create('brand', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label',200);
        });
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label',200);
            $table->unsignedInteger('price');
			$table->index('price');
			
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brand');
			
            $table->timestamps();
        });
        Schema::create('product__image', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product');
			$table->unsignedInteger('image_id');
            $table->foreign('image_id')->references('id')->on('image');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product__image');
        Schema::dropIfExists('product');
        Schema::dropIfExists('brand');
        Schema::dropIfExists('image');
    }
}
