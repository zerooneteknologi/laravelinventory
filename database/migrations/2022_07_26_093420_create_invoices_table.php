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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('memberId')->nullable();
            $table->string('payment')->nullable();
            $table->string('invoiceNo')->unique();
            $table->date('date');
            $table->integer('pay')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('payTotal')->nullable();
            $table->integer('cash')->nullable();
            $table->integer('refund')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
