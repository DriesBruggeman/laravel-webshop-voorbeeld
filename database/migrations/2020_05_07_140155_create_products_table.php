<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->string('name');
            $table->string('refNumber');
            $table->string('brand');
            $table->text('description');
            $table->integer('stock');
            $table->decimal('price', 7 , 2);
            $table->string('mainImage')->nullable();
            $table->decimal('discount',4,2)->nullable();
            $table->date('deliverableFrom')->nullable();

            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

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
}
