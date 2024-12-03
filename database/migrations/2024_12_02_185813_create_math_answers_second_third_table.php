<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMathAnswersSecondThirdTable extends Migration
{
    public function up()
    {
        Schema::create('math_answers_second_third', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id'); // Foreign key for math_second_third table
            $table->unsignedBigInteger('user_id'); // Foreign key for users table
            $table->string('answer'); // Answer field
            $table->timestamps(); // created_at and updated_at

            // Define foreign key constraints
            $table->foreign('question_id')->references('id')->on('math_second_third')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('math_answers_second_third');
    }
}
