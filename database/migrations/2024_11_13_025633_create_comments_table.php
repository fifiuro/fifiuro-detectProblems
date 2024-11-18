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
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // Llave foranea
            $table->uuid('problem_id');
            $table->foreign('problem_id')->references('id')->on('problem');
            //
            // Llave foranea
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            // 
            $table->text('comment');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
