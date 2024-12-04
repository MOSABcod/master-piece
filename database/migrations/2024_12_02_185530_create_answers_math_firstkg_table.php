<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersMathFirstkgTable extends Migration
{
    public function up()
    {
        Schema::create('answers_math_firstkg', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id'); // Foreign key for math_first_kg table
            $table->unsignedBigInteger('user_id'); // Foreign key for users table
            $table->string('answer'); // Answer field
            $table->boolean('is_correct')->default(false); // Whether the answer is correct

            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('question_id')->references('id')->on('math_first_kg')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers_math_firstkg');
    }
}
