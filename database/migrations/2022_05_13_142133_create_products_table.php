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
            $table->foreignId('categoryId');
            $table->foreignId('suplayerId');
            $table->string('productCode')->unique();
            $table->string('productName');
            $table->string('brand');
            $table->integer('stock')->default('0');
            $table->integer('purchasePrice')->nullable();
            $table->integer('sellingPrice')->nullable();
            $table->softDeletes();
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
