<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->boolean('confirmed')->default(true);
            $table->time('departtime')->nullable();
            $table->float('ticketprice', 8, 2);
            $table->longText('description')->nullable();
            $table->string('depart', 30)->default('milano');
            $table->string('destination', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
