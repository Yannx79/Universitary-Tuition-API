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
        Schema::create('course_students', function (Blueprint $table) {
            $table->id();
            $table->float('note', 2)->nullable();

            $table->foreignId('course_id')
                ->nullable()
                ->references('id')
                ->on('courses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('student_id')
                ->nullable()
                ->references('id')
                ->on('students')
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
        Schema::dropIfExists('courses_students');
    }
};
