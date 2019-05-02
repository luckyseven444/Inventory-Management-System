<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StockOut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockout', function (Blueprint $table) {
            $table->increments('id');
            $table->string('challan_out_id');
            $table->string('customer_id');
            $table->string('product_id');
            $table->string('selling_quantity');
            $table->string('selling_unit_price');

            //$table->string('selling_price');
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
        Schema::dropIfExists('stockout');
    }
}
