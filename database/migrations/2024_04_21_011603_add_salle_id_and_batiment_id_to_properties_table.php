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
        Schema::table('properties', function (Blueprint $table) {
            $table->foreignId('salle_id')->constrained('salles')->onDelete('cascade')->after('module_id');
            $table->foreignId('batiment_id')->constrained('batiments')->onDelete('cascade')->after('module_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign(['salle_id']);
            $table->dropColumn('salle_id');
            $table->dropForeign(['batiment_id']);
            $table->dropColumn('batiment_id');
        });
    }
};
