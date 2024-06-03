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

            Schema::create('cahiers', function (Blueprint $table) {
                $table->id();
                $table->date('date');
                $table->time('heure_debut');
                $table->time('heure_fin');
                $table->string('contenu');
                $table->enum('statut', ['accepte', 'refuse', 'en attente'])->default('en attente');
 $table->foreignId('etudiant_id')->constrained('users')->onDelete('cascade');
                $table->timestamps();
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cahiers');
    }
};

