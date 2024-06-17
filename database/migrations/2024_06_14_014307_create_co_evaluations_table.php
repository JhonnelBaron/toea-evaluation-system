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
        Schema::create('co_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploader_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->integer('b1c')->nullable();
            $table->text('b1c_remarks')->nullable();
            $table->integer('b1d')->nullable();
            $table->text('b1d_remarks')->nullable();
            $table->integer('b1e')->nullable();
            $table->text('b1e_remarks')->nullable();
            $table->integer('b1f')->nullable();
            $table->text('b1f_remarks')->nullable();
            $table->integer('b2a31')->nullable();
            $table->text('b2a31_remarks')->nullable();
            $table->integer('b2a32')->nullable();
            $table->text('b2a32_remarks')->nullable();
            $table->integer('b2a33')->nullable();
            $table->text('b2a33_remarks')->nullable();
            $table->integer('b2c1')->nullable();
            $table->text('b2c1_remarks')->nullable();
            $table->integer('b2c2')->nullable();
            $table->text('b2c2_remarks')->nullable();
            $table->integer('b2c3')->nullable();
            $table->text('b2c3_remarks')->nullable();
            $table->integer('b2c4')->nullable();
            $table->text('b2c4_remarks')->nullable();
            $table->integer('b2c7')->nullable();
            $table->text('b2c7_remarks')->nullable();
            $table->integer('b2e11a')->nullable();
            $table->text('b2e11a_remarks')->nullable();
            $table->integer('b2e11b')->nullable();
            $table->text('b2e11b_remarks')->nullable();
            $table->integer('b2e12a')->nullable();
            $table->text('b2e12a_remarks')->nullable();
            $table->integer('b2e13b')->nullable();
            $table->text('b2e13b_remarks')->nullable();
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
        Schema::dropIfExists('co_evaluations');
    }
};
