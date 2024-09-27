<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            // $table->id();
            $table->string("Order_id",50)->uniqid()->autoIncrement();
            $table->string("Pro_id")->nullable(false);
            $table->string("Pro_img")->nullable(false);
            $table->string("Payment_method",50);
            $table->date("Order_date")->nullable(false);
            $table->date("Delivery_date");
            $table->string("Order_status",50)->default("Ordered");
            $table->string("Email")->nullable(false);
            $table->string("Quantity")->nullable(false);
            $table->integer("Size")->nullable(false);
            $table->string("Return_reason")->default("No reason");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
