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
        Schema::create('exams', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->string('exam_name', 100); // Name of the exam
            $table->unsignedBigInteger('creator_user_id'); // Foreign key to users.id (Teacher)
            $table->date('date_created'); // Date the exam was created
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
