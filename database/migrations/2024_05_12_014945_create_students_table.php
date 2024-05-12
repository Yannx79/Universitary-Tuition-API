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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->enum('career', ['Systems Engineering', 'Industrial Engineering', 'Medicine', 'Administration'])->nullable();
            $table->enum('faculty', ['Engineering and Architecture', 'Medicine'])->nullable();

            //$table->unsignedBigInteger('person_id')->nullable();
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
        Schema::dropIfExists('students');
    }
};
