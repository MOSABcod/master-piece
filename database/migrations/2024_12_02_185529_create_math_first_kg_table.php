<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMathFirstKgTable extends Migration
{
    public function up()
    {
        Schema::create('math_first_kg', function (Blueprint $table) {
            $table->id();
            $table->string('question'); // Question field
            $table->string('correct_answer'); // Question field
            $table->timestamps(); // Created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('math_first_kg');
    }
}
