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
        Schema::create('bro_b_externals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('validator_id')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->integer('b1a')->nullable();
            $table->text('b1a_remarks')->nullable();
            $table->integer('b1b')->nullable();
            $table->text('b1b_remarks')->nullable();
            $table->integer('b1c')->nullable();
            $table->text('b1c_remarks')->nullable();
            $table->integer('b1d')->nullable();
            $table->text('b1d_remarks')->nullable();
            $table->integer('b1e')->nullable();
            $table->text('b1e_remarks')->nullable();
            $table->integer('b1f')->nullable();
            $table->text('b1f_remarks')->nullable();
            $table->integer('b1g')->nullable();
            $table->text('b1g_remarks')->nullable();
            $table->integer('b1h')->nullable();
            $table->text('b1h_remarks')->nullable();
            $table->integer('b1i')->nullable();
            $table->text('b1i_remarks')->nullable();
            $table->integer('b2a1')->nullable();
            $table->text('b2a1_remarks')->nullable();
            $table->integer('b2a2')->nullable();
            $table->text('b2a2_remarks')->nullable();
            $table->integer('b2a3')->nullable();
            $table->text('b2a3_remarks')->nullable();
            $table->integer('b2a41')->nullable();
            $table->text('b2a41_remarks')->nullable();
            $table->integer('b2a42')->nullable();
            $table->text('b2a42_remarks')->nullable();
            $table->integer('b2a43')->nullable();
            $table->text('b2a43_remarks')->nullable();
            $table->integer('b2b1')->nullable();
            $table->text('b2b1_remarks')->nullable();
            $table->integer('b2b2')->nullable();
            $table->text('b2b2_remarks')->nullable();
            $table->integer('b2b3')->nullable();
            $table->text('b2b3_remarks')->nullable();
            $table->integer('b2b4')->nullable();
            $table->text('b2b4_remarks')->nullable();
            $table->integer('b2b5')->nullable();
            $table->text('b2b5_remarks')->nullable();
            $table->integer('b2c1')->nullable();
            $table->text('b2c1_remarks')->nullable();
            $table->integer('b2c2')->nullable();
            $table->text('b2c2_remarks')->nullable();
            $table->integer('b2c3')->nullable();
            $table->text('b2c3_remarks')->nullable();
            $table->integer('b2c4')->nullable();
            $table->text('b2c4_remarks')->nullable();
            $table->integer('b2c5')->nullable();
            $table->text('b2c5_remarks')->nullable();
            $table->integer('b2c6')->nullable();
            $table->text('b2c6_remarks')->nullable();
            $table->integer('b2d1')->nullable();
            $table->text('b2d1_remarks')->nullable();
            $table->integer('b2d2')->nullable();
            $table->text('b2d2_remarks')->nullable();
            $table->integer('b2d31')->nullable();
            $table->text('b2d31_remarks')->nullable();
            $table->integer('b2d32')->nullable();
            $table->text('b2d32_remarks')->nullable();
            $table->integer('b2d411')->nullable();
            $table->text('b2d411_remarks')->nullable();
            $table->integer('b2d412')->nullable();
            $table->text('b2d412_remarks')->nullable();
            $table->integer('b2d421')->nullable();
            $table->text('b2d421_remarks')->nullable();
            $table->integer('b2d422')->nullable();
            $table->text('b2d422_remarks')->nullable();
            $table->integer('b2d431')->nullable();
            $table->text('b2d431_remarks')->nullable();
            $table->integer('b2d432')->nullable();
            $table->text('b2d432_remarks')->nullable();
            $table->integer('b2d441')->nullable();
            $table->text('b2d441_remarks')->nullable();
            $table->integer('b2d442')->nullable();
            $table->text('b2d442_remarks')->nullable();
            $table->integer('b2d5')->nullable();
            $table->text('b2d5_remarks')->nullable();
            $table->integer('b2d6')->nullable();
            $table->text('b2d6_remarks')->nullable();
            $table->integer('b2e11a')->nullable();
            $table->text('b2e11a_remarks')->nullable();
            $table->integer('b2e11b')->nullable();
            $table->text('b2e11b_remarks')->nullable();
            $table->integer('b2e12a')->nullable();
            $table->text('b2e12a_remarks')->nullable();
            $table->integer('b2e12b')->nullable();
            $table->text('b2e12b_remarks')->nullable();
            $table->integer('b2e13a')->nullable();
            $table->text('b2e13a_remarks')->nullable();
            $table->integer('b2e13b')->nullable();
            $table->text('b2e13b_remarks')->nullable();
            $table->integer('b2e21')->nullable();
            $table->text('b2e21_remarks')->nullable();
            $table->integer('b2e22')->nullable();
            $table->text('b2e22_remarks')->nullable();
            $table->integer('b2e23')->nullable();
            $table->text('b2e23_remarks')->nullable();
            $table->integer('b2e3')->nullable();
            $table->text('b2e3_remarks')->nullable();
            $table->decimal('progress_percentage', 5, 2)->nullable();
            $table->integer('overall_total_score')->nullable();
            $table->integer('overall_total_filled')->nullable();
            $table->integer('total_fields')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bro_b_externals');
    }
};
