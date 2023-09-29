<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->integer('sales_id');
            $table->integer('category_id');
            $table->integer('product_id');
            $table->integer('unit_id');
            $table->integer('quantity');
            $table->string('rate');
            $table->integer('product_discount')->default(0)->comment('1=%,2=BDT');
            $table->string('product_discount_amount');
            $table->string('product_total_amount');
            $table->integer('userId');
            $table->integer('branchId');
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
        Schema::dropIfExists('sales_details');
    }
};
