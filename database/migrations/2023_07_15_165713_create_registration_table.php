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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string("First_name",50)->nullable(false);
            $table->string("Last_name",50)->nullable(false);
            $table->integer("Mobile_no")->nullable(false);
            $table->string("Address")->default("");
            $table->string("State")->default("");
            $table->string("City")->default("");
            $table->string("Pin_code")->default("");
            $table->string("Bank_name")->default("");
            $table->string("Account_no")->default("");
            $table->string("Ifsc_code")->default("");
            $table->string("Email")->nullable(false);
            $table->string("Password")->nullable(false);
            $table->string("Profile_picture")->default('default.png');
            $table->string("Status",50)->default("Inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register');
    }
};
