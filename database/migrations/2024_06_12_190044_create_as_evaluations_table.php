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
        Schema::create('as_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploader_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->integer('a6')->nullable();
            $table->string('a6_remarks')->nullable();
            $table->integer('a8')->nullable();
            $table->string('a8_remarks')->nullable();
            $table->integer('c31')->nullable();
            $table->string('c31_remarks')->nullable();
            $table->integer('c32')->nullable();
            $table->string('c32_remarks')->nullable();
            $table->integer('c411')->nullable();
            $table->string('c411_remarks')->nullable();
            $table->integer('c412')->nullable();
            $table->string('c412_remarks')->nullable();
            $table->integer('c421')->nullable();
            $table->string('c421_remarks')->nullable();
            $table->integer('c422')->nullable();
            $table->string('c422_remarks')->nullable();
            $table->integer('c431')->nullable();
            $table->string('c431_remarks')->nullable();
            $table->integer('c432')->nullable();
            $table->string('c432_remarks')->nullable();
            $table->integer('c5')->nullable();
            $table->string('c5_remarks')->nullable();
            $table->integer('d1')->nullable();
            $table->string('d1_remarks')->nullable();
            $table->decimal('progress_percentage', 5, 2)->nullable();
            $table->integer('overall_total_score')->nullable();
            $table->integer('overall_total_filled')->nullable();
            $table->integer('total_fields')->nullable();
            $table->text('final_remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('as_evaluations');
    }
};
