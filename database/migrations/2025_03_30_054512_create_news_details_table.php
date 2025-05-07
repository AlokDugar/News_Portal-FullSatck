<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_path');
            $table->foreignId('type_id')->nullable()->constrained('types')->onDelete('cascade');
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->string('state');
            $table->date('published_date')->nullable();
            $table->longText('content');
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_details');
    }
};
