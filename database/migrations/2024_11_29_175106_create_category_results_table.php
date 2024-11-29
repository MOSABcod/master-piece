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
        Schema::create('category_results', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->unsignedBigInteger('result_id'); // Foreign key to results.id
            $table->unsignedBigInteger('category_id'); // Foreign key to categories.id
            $table->decimal('category_score', 5, 2)->default(0); // Score for the specific category
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Ensure a category result is unique per result and category
            $table->unique(['result_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_results');
    }
};
