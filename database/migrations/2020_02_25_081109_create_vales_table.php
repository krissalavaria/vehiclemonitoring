<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->DateTime('date');
            $table->string('address');
            $table->string('plate_number');
            $table->string('description');
            $table->string('quantity');
            $table->integer('unit_cost');
            $table->integer('total_amount');
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
        Schema::dropIfExists('vales');
    }
}
