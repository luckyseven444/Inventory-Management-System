<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stockin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lot');
            $table->integer('product_id');
            $table->integer('supplier_id');
            $table->integer('unit_price');
            $table->integer('quantity');
            $table->integer('current_quantity')->nullable();
            $table->integer('discount');
            $table->integer('cost');
            $table->integer('challan_id');
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
        Schema::dropIfExists('stockin');
    }
}
