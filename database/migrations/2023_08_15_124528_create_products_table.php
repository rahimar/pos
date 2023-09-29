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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_barcode')->default(0);
            $table->string('product_code');
            $table->string('product_generic');
            $table->integer('product_type')->default(0);
            $table->integer('brand_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('unit_id')->default(0);
            $table->integer('status')->default(0);
            $table->integer('branchId')->default(1);
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
};
