<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScienceTable extends Migration
{
    public function up()
    {
        Schema::create('science', function (Blueprint $table) {
            $table->id();
            $table->string('question'); // Column for the science question
            $table->string('correct_answer'); // Question field

            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('science');
    }
}
