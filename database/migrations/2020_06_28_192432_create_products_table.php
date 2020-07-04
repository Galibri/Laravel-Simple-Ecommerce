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
            $table->unsignedInteger('product_category_id')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->float('price')->default(0);
            $table->float('selling_price')->default(0);
            $table->string('sku')->nullable();
            $table->string('qty')->default(0);
            $table->tinyInteger('virtual')->default(0);
            $table->string('thumbnail')->nullable();
            $table->tinyInteger('status')->default(1);
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
