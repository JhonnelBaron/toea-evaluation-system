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
        Schema::create('fms_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploader_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->integer('a5a')->nullable();
            $table->text('a5a_remarks')->nullable();
            $table->integer('a5b')->nullable();
            $table->text('a5b_remarks')->nullable();
            $table->integer('a7a')->nullable();
            $table->text('a7a_remarks')->nullable();
            $table->integer('a7b')->nullable();
            $table->text('a7b_remarks')->nullable();
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
        Schema::dropIfExists('fms_evaluations');
    }
};
