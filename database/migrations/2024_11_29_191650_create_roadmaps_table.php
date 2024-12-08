<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadmapsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('roadmaps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('generated_by', 50)->default('ChatGPT');
            $table->text('response'); // Store the Markdown roadmap
            $table->text('result'); // Store the Markdown roadmap
            $table->text('score'); // Store the Markdown roadmap
            $table->text('level'); // Store the Markdown roadmap
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('roadmaps');
    }
}
