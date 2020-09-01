<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * roda as migracoes
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('product_name')->unique();
            $table->string('description');
            $table->integer('quantity');            
        });
    }

    /**
     * reverte as migracoes
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
