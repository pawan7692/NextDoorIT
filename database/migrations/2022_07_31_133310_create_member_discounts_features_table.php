<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberDiscountsFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_discounts_features', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->boolean('is_valid');
            $table->unsignedBigInteger('member_discount_id');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('member_discount_id')->references('id')->on('member_discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_discounts_features');
    }
}
