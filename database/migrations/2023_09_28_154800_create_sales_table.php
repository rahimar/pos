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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('sales_number');
            $table->string('sales_date');
            $table->string('subTotal');
            $table->integer('vat')->default(0)->comment('1=%,2=BDT');
            $table->string('vat_amount');
            $table->integer('discount')->default(0)->comment('1=%,2=BDT');
            $table->string('discount_amount');
            $table->string('discount_note');
            $table->string('total_amount');
            $table->string('payable_amount');
            $table->integer('payable_type')->default(0)->comment('1=paid,2=Due,3=partial');
            $table->string('payable_note');
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
        Schema::dropIfExists('sales');
    }
};
