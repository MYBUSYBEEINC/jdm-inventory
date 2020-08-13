<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('product_code')->unique()->nullable();
            $table->string('product_name')->unique()->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('subsubcategory_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('classification_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('scale')->nullable();
            $table->string('image');
            $table->float('price_min', 8, 2)->nullable();
            $table->float('price_max', 8, 2)->nullable();
            $table->longText('description')->nullable();
            $table->timestamps('');
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
