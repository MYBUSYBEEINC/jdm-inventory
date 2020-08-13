<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ave_age');
            $table->string('quantity');
            $table->string('lpp');
            $table->string('ave_price');
            $table->string('margin_percent');
            $table->string('margin_amt');
            $table->string('cash_price');
            $table->string('reg_selling_price');
            $table->string('product_name');
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
        Schema::dropIfExists('pricings');
    }
}
