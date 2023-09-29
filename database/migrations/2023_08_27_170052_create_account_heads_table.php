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
        Schema::create('account_heads', function (Blueprint $table) {
            $table->id();
            $table->string('head_name');
            $table->integer('head_type')->default(0)->comment('1=Asset,2=Liabilities,3=Expenses,4=Revenue');
            $table->integer('is_group')->default(0)->comment('1=Group,2=Non');
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->integer('branchId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_heads');
    }
};
