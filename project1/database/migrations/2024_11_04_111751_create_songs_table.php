<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
    Schema::create('songs', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('artist');
        $table->string('album')->nullable();
        $table->string('genre')->nullable();
        $table->date('release_date')->nullable();
        $table->string('file_path');
        $table->string('cover_path')->nullable();
        $table->timestamps();
    });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};