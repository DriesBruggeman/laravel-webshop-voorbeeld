<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreignId('billing_address');
            $table->foreign('billing_address')->references('id')->on('addresses');

            $table->foreignId('delivery_address');
            $table->foreign('delivery_address')->references('id')->on('addresses');

            $table->decimal('totalPrice',8,2);
            $table->tinyInteger('waitForStock')->nullable();
            $table->date('deliveryDate')->nullable();
            $table->tinyInteger('paid');
            $table->tinyInteger('delivered');

            $table->text('notes')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
