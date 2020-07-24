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
            $table->unsignedInteger('user_id');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->boolean('different_shipping')->default(false);
            $table->string('s_address_line_1')->nullable();
            $table->string('s_address_line_2')->nullable();
            $table->string('s_city')->nullable();
            $table->string('s_state')->nullable();
            $table->string('s_zip')->nullable();
            $table->string('s_country')->nullable();
            $table->text('additional')->nullable();
            $table->string('payment_method')->nullable();
            $table->float('sub_total')->default(0);
            $table->float('coupon_amount')->default(0);
            $table->float('shipping_charge')->default(0);
            $table->float('tax_amount')->default(0);
            $table->unsignedInteger('shipping_id')->nullable();
            $table->float('order_total')->default(0);
            $table->string('payment_status')->default('pending');
            $table->string('order_status')->default('pending');
            $table->boolean('is_seen')->default(false);
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