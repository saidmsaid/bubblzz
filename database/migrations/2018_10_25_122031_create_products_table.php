<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_ar');
            $table->string('small_description');
            $table->string('small_description_ar');
            $table->text('full_description');
            $table->text('full_description_ar');
            $table->string('price')->default(0);
            $table->string('offer')->default(0);
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('featured');
            $table->integer('special');
            $table->integer('recent');
            $table->integer('sold');
            $table->string('youtube_link');
            $table->string('default_image');
            $table->integer('product_code')->nullable();
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
        Schema::dropIfExists('products');
    }
}
