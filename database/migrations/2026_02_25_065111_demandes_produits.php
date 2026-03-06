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
        Schema::create('demandes_produits', function (Blueprint $table) {
            $table->id();

            $table->foreignId('demande_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('produit_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('quantite')->default(1);
            $table->decimal('prix_initial', 8, 2);
            $table->decimal('prix_promo', 8, 2)->nullable();

            $table->timestampTz('created_at')->nullable();
            $table->timestampTz('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
