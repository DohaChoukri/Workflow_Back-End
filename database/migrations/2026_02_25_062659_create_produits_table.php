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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');              
            $table->string('reference')->unique();
            $table->text('description')->nullable();
            $table->decimal('prix', 8, 2);
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->boolean('actif')->default(true);
            $table->timestampTz('created_at')->nullable();
            $table->timestampTz('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
