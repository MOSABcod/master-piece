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
        Schema::create('answers', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->unsignedBigInteger('user_id'); // Foreign key to users.id
            $table->unsignedBigInteger('question_id'); // Foreign key to questions.id
            $table->text('answer_text')->nullable(); // Answer text (nullable)
            $table->unsignedBigInteger('selected_option_id')->nullable(); // Foreign key to question_options.id (nullable)
            $table->unsignedBigInteger('answer_voice_id')->nullable(); // Foreign key to media.id (nullable)
            $table->dateTime('date_submitted'); // Date and time the answer was submitted
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('selected_option_id')->references('id')->on('question_options')->onDelete('set null');
            $table->foreign('answer_voice_id')->references('id')->on('media')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
