<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArabicSecondThirdTable extends Migration
{
    public function up()
    {
        Schema::create('arabic_second_third', function (Blueprint $table) {
            $table->id();
            $table->string('question'); // Column for the question
            $table->string('correct_answer'); // Question field

            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('arabic_second_third');
    }
}
