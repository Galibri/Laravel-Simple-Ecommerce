<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string( 'name' )->nullable();
            $table->text( 'description' )->nullable();
            $table->boolean('is_fixed')->default(true);
            $table->float('amount')->default(0);
            $table->unsignedInteger('used')->default(0);
            $table->unsignedInteger('max_uses')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamp( 'starts_at' );
            $table->timestamp( 'expires_at' );
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
        Schema::dropIfExists('coupons');
    }
}
