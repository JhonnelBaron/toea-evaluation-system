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
        Schema::create('awardings_finalist_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('category')->nullable();
            $table->string('grouping')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->longText('nominee')->nullable();
            $table->decimal('secretariat_score', 8, 2)->nullable();
            $table->decimal('score_13', 8, 2)->nullable();
            $table->decimal('score_16', 8, 2)->nullable();
            $table->decimal('score_17', 8, 2)->nullable();
            $table->decimal('average', 8, 2)->nullable();
            $table->string('placement')->nullable();
            $table->string('awarding_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awardings_finalist_records');
    }
};
