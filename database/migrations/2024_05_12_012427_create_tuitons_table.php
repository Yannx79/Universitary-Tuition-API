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
        Schema::create('tuitons', function (Blueprint $table) {
            $table->id();
            $table->string('grade', 30)->nullable();
            $table->date('tuiton_date')->nullable();

            //$table->unsignedBigInteger('student_id')->unique()->nullable();
            $table->foreignId('student_id')
                ->unique()
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
        Schema::dropIfExists('tuitons');
    }
};
