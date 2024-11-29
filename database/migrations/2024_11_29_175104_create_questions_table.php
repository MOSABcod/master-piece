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
        Schema::create('questions', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->unsignedBigInteger('exam_id'); // Foreign key to exams.id
            $table->unsignedBigInteger('category_id'); // Foreign key to categories.id
            $table->text('question_text')->nullable(); // Question text (nullable)
            $table->unsignedBigInteger('question_image_id')->nullable(); // Foreign key to media.id (nullable)
            $table->integer('question_order'); // Order of the question in the exam
            $table->int('answer_type'); // 'Input'= 1 or 'Radio' = 0
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('question_image_id')->references('id')->on('media')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
