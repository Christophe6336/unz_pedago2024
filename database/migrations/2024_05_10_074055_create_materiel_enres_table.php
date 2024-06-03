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
        Schema::create('materiel_enres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materiel_id')->constrained()->onDelete('cascade');
            $table->enum('action', ['entree', 'sortie']);
            $table->unsignedInteger('quantite');
            $table->string('delegue');
            $table->date('date_retour')->nullable();// Utilisé pour les matériels non consommables
            $table->enum('statut', ['en_cours', 'termine'])->default('en_cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiel_enres');
    }
};
