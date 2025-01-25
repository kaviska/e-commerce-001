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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('province', 100);
            $table->string('district', 100);
            $table->string('number', 10); // Assuming house/building number
            $table->string('postal_code', 20);
            $table->timestamps();
        
            // Indexing for better performance
            $table->index(['postal_code', 'district', 'province']);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
