<?php

use App\Models\Artisan;
use App\Models\Competences;
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
        Schema::create('artisan_competences', function (Blueprint $table) {
            $table->id();
           $table->foreignIdFor(Artisan::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Competences::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artisan_competences');
    }
};
