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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->integer('remise');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->text('motif')->nullable();
            $table->enum('statut', ['brouillon', 'soumis', 'approuve', 'rejetée'])->default('brouillon');
            $table->timestampTz('created_at')->nullable();
            $table->timestampTz('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
