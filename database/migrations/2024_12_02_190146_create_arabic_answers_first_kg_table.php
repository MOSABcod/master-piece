<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArabicAnswersFirstKgTable extends Migration
{
    public function up()
    {
        Schema::create('arabic_answers_first_kg', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id'); // Foreign key referencing arabic_first_kg
            $table->string('answer'); // The answer text
            $table->boolean('is_correct')->default(false); // Whether the answer is correct
            $table->timestamps(); // created_at and updated_at

            // Define the foreign key constraint
            $table->foreign('question_id')
                ->references('id')
                ->on('arabic_first_kg')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('arabic_answers_first_kg');
    }
}
