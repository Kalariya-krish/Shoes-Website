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
        Schema::create('offer_discount', function (Blueprint $table) {
            $table->id();
            $table->string("Pro_id")->nullable(false);
            $table->double("Discount")->nullable(false);
            $table->date("Last_date")->nallable(false);
            $table->string("Status",20)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_discount');
    }
};
