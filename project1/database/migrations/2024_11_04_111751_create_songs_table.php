<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
    Schema::create('songs', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->foreignIdFor(\App\Models\Artist::class);
        $table->foreignIdFor(\App\Models\Album::class);
        $table->date('release_date')->nullable();
        $table->timestamps();
    });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};