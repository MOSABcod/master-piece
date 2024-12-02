<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArabicFirstKgTable extends Migration
{
    public function up()
    {
        Schema::create('arabic_first_kg', function (Blueprint $table) {
            $table->id();
            $table->string('question'); // The question column
            $table->string('correct_answer'); // Question field

            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('arabic_first_kg');
    }
}
