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
        Schema::create('ce_providers', function (Blueprint $table) {
            $table->id();
            $table->string('libelle_fr');
            $table->string('libelle_ar');
            $table->string('tel');
            $table->string('email'); 
            $table->string('adresse');
            $table->boolean('livre');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('ville_id')->references('id')->on('ce_villes');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('ce_type_providers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ce_providers');
    }
};
