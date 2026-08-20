<?php

use App\Models\CardSet;
use App\Models\EffectType;
use App\Models\Species;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->foreignIdFor(CardSet::class)->constrained()->onDelete('cascade');
            $table->integer('power');
            $table->string('effect', 128);
            $table->integer('number');
            $table->foreignIdFor(Species::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(EffectType::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
