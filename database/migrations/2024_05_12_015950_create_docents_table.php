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
        Schema::create('docents', function (Blueprint $table) {
            $table->id();
            $table->enum('contract_type', ['Contract for work', 'Fixed-term employment contract', 'Indefinite-term employment contract', 
            'Apprenticeship contract', 'Temporary contract'])->nullable();

            $table->foreignId('people_id')
                ->nullable()
                ->references('id')
                ->on('people')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docents');
    }
};
