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
        Schema::create('nitesd_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploader_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->integer('b2a1')->nullable();
            $table->text('b2a1_remarks')->nullable();
            $table->integer('b2a2')->nullable();
            $table->text('b2a2_remarks')->nullable();
            $table->integer('b2d31')->nullable();
            $table->text('b2d31_remarks')->nullable();
            $table->integer('b2d32')->nullable();
            $table->text('b2d32_remarks')->nullable();
            $table->integer('b2d441')->nullable();
            $table->text('b2d441_remarks')->nullable();
            $table->integer('b2d442')->nullable();
            $table->text('b2d442_remarks')->nullable();
            $table->integer('b2e3')->nullable();
            $table->text('b2e3_remarks')->nullable();
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
        Schema::dropIfExists('nitesd_evaluations');
    }
};
