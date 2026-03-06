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
        Schema::table('demandes', function (Blueprint $table) {
            // add foreign key to progresses
            $table->foreignId('progress_id')->nullable()->after('motif')
                  ->constrained('progresses')
                  ->nullOnDelete();

            // optionally we could keep the existing 'statut' column for backward compatibility
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('progress_id');
        });
    }
};
