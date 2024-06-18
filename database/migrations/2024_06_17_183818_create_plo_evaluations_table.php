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
        Schema::create('plo_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploader_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->integer('b1g')->nullable();
            $table->text('b1g_remarks')->nullable();
            $table->integer('b2d411')->nullable();
            $table->text('b2d411_remarks')->nullable();
            $table->integer('b2d412')->nullable();
            $table->text('b2d412_remarks')->nullable();
            $table->integer('b2d42')->nullable();
            $table->text('b2d42_remarks')->nullable();
            $table->integer('b2d421')->nullable();
            $table->text('b2d421_remarks')->nullable();
            $table->integer('b2d422')->nullable();
            $table->text('b2d422_remarks')->nullable();
            $table->integer('b2d43')->nullable();
            $table->text('b2d43_remarks')->nullable();
            $table->integer('b2d431')->nullable();
            $table->text('b2d431_remarks')->nullable();
            $table->integer('b2d432')->nullable();
            $table->text('b2d432_remarks')->nullable();
            $table->integer('b2d5')->nullable();
            $table->text('b2d5_remarks')->nullable();
            $table->integer('b2d6')->nullable();
            $table->text('b2d6_remarks')->nullable();
            $table->integer('d1')->nullable();
            $table->text('d1_remarks')->nullable();
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
        Schema::dropIfExists('plo_evaluations');
    }
};
