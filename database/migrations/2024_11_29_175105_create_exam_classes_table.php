<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exam_classes', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->unsignedBigInteger('exam_id'); // Foreign key to exams.id
            $table->unsignedBigInteger('class_id'); // Foreign key to classes.id
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');

            // Ensure an exam is assigned to a class only once
            $table->unique(['exam_id', 'class_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_classes');
    }
};
