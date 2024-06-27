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
        Schema::create('po_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploader_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->integer('b1a')->nullable();
            $table->text('b1a_remarks')->nullable();
            $table->integer('b1b')->nullable();
            $table->text('b1b_remarks')->nullable();
            $table->integer('b1i')->nullable();
            $table->text('b1i_remarks')->nullable();
            $table->integer('b2b1')->nullable();
            $table->text('b2b1_remarks')->nullable();
            $table->integer('b2b5')->nullable();
            $table->text('b2b5_remarks')->nullable();
            $table->integer('b2d1')->nullable();
            $table->text('b2d1_remarks')->nullable();
            $table->integer('b2d2')->nullable();
            $table->text('b2d2_remarks')->nullable();
            $table->integer('b2e21')->nullable();
            $table->text('b2e21_remarks')->nullable();
            $table->integer('b2e22')->nullable();
            $table->text('b2e22_remarks')->nullable();
            $table->integer('b2e23')->nullable();
            $table->text('b2e23_remarks')->nullable();
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
        Schema::dropIfExists('po_evaluations');
    }
};
