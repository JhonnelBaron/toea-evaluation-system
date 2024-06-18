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
        Schema::create('romo_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploader_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->integer('b1h')->nullable();
            $table->text('b1h_remarks')->nullable();
            $table->integer('b2b2')->nullable();
            $table->text('b2b2_remarks')->nullable();
            $table->integer('b2b3')->nullable();
            $table->text('b2b3_remarks')->nullable();
            $table->integer('b2b4')->nullable();
            $table->text('b2b4_remarks')->nullable();
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
        Schema::dropIfExists('romo_evaluations_table');
    }
};
