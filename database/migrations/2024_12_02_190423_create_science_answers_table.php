<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScienceAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('science_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id'); // Foreign key referencing science table
            $table->unsignedBigInteger('user_id'); // Foreign key referencing users table
            $table->string('answer'); // Column for the answer text
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('question_id')->references('id')->on('science')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('science_answers');
    }
}
