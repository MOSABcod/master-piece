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
        Schema::create('question_options', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->unsignedBigInteger('question_id'); // Foreign key to questions.id
            $table->string('option_text', 255)->nullable(); // Option text (nullable)
            $table->unsignedBigInteger('option_media_id')->nullable(); // Foreign key to media.id (nullable)
            $table->boolean('is_correct')->default(false); // Indicates if the option is correct
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('option_media_id')->references('id')->on('media')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_options');
    }
};
