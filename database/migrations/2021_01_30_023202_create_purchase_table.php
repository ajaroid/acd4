<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->decimal('total', 11);
            $table->foreignId('supplier_id')->constrained();
        });

        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('quantity');
            $table->decimal('subtotal', 11);
            $table->foreignId('product_id')->constrained();
            $table->foreignId('purchase_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
    }
}
