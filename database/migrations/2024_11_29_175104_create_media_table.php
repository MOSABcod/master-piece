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
        Schema::create('media', function (Blueprint $table) {
            $table->id(); // Primary key: id
            $table->string('media_type', 10); // 'Image' or 'Voice'
            $table->string('media_url', 255); // URL or path to the media
            $table->dateTime('upload_date'); // Date and time the media was uploaded
            $table->timestamps(); // created_at and updated_at

            // Optionally, enforce possible values using a check constraint (MySQL 8+)
            // Note: Laravel migrations do not support check constraints out-of-the-box
            // You may need to use raw SQL or a package for this
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
