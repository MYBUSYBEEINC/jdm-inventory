<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('po_number')->nullable();
            $table->date('po_date')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('req_branch')->nullable();
            $table->integer('del_branch')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
