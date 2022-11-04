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
        Schema::create('category_menu', function (Blueprint $table) {
            $table->increments('id');         
            $table->unsignedBigInteger('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('menu_id')
                ->references('id')
                ->on('menues')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_menu');
    }
};
