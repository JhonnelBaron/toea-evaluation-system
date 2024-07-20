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
        Schema::create('endorsed_externals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('category')->nullable();
            $table->string('grouping')->nullable();
            $table->string('province')->nullable();
            $table->longText('nominee')->nullable();
            $table->integer('criteria_a')->nullable();
            $table->integer('criteria_b')->nullable();
            $table->integer('criteria_c')->nullable();
            $table->integer('criteria_d')->nullable();
            $table->integer('criteria_e')->nullable();
            $table->integer('romo_final_score')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('evaluator_first')->nullable();
            $table->string('evaluator_last')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endorsed_externals');
    }
};
