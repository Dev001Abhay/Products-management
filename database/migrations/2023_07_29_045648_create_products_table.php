<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            
            $table->unsignedBigInteger('user_id');
           
            $table->string('name')->nullable();
            $table->text('images')->nullable();
            $table->float('max_price',8,2)->nullable();
            $table->float('price', 8,2)->nullable();
            $table->enum('status', ['Pending', 'Wait', 'Active'])->nullable()->default('Active');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('admins');
            
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
