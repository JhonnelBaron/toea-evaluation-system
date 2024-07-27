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
        Schema::create('rst_b_externals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('validator_id')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->integer('b1a')->nullable();
            $table->text('b1a_remarks')->nullable();
            $table->integer('b1b')->nullable();
            $table->text('b1b_remarks')->nullable();
            $table->integer('b1c1')->nullable();
            $table->text('b1c1_remarks')->nullable();
            $table->integer('b1c2')->nullable();
            $table->text('b1c2_remarks')->nullable();
            $table->integer('b1c3')->nullable();
            $table->text('b1c3_remarks')->nullable();
            $table->integer('b1d1')->nullable();
            $table->text('b1d1_remarks')->nullable();
            $table->integer('b2a')->nullable();
            $table->text('b2a_remarks')->nullable();
            $table->integer('b2b')->nullable();
            $table->text('b2b_remarks')->nullable();
            $table->integer('b2c')->nullable();
            $table->text('b2c_remarks')->nullable();
            $table->integer('b2d')->nullable();
            $table->text('b2d_remarks')->nullable();
            $table->integer('b2e')->nullable();
            $table->text('b2e_remarks')->nullable();
            $table->integer('b2f')->nullable();
            $table->text('b2f_remarks')->nullable();
            $table->integer('b2g')->nullable();
            $table->text('b2g_remarks')->nullable();
            $table->integer('b2h')->nullable();
            $table->text('b2h_remarks')->nullable();
            $table->integer('b2i')->nullable();
            $table->text('b2i_remarks')->nullable();
            $table->integer('b2j')->nullable();
            $table->text('b2j_remarks')->nullable();
            $table->integer('b3a')->nullable();
            $table->text('b3a_remarks')->nullable();
            $table->integer('b3b')->nullable();
            $table->text('b3b_remarks')->nullable();
            $table->integer('b3c')->nullable();
            $table->text('b3c_remarks')->nullable();
            $table->integer('b3d')->nullable();
            $table->text('b3d_remarks')->nullable();
            $table->integer('b3e')->nullable();
            $table->text('b3e_remarks')->nullable();
            $table->integer('b3f')->nullable();
            $table->text('b3f_remarks')->nullable();
            $table->integer('b4a1')->nullable();
            $table->text('b4a1_remarks')->nullable();
            $table->integer('b4a2')->nullable();
            $table->text('b4a2_remarks')->nullable();
            $table->integer('b4b')->nullable();
            $table->text('b4b_remarks')->nullable();
            $table->integer('b4c')->nullable();
            $table->text('b4c_remarks')->nullable();
            $table->integer('b4d')->nullable();
            $table->text('b4d_remarks')->nullable();
            $table->integer('b4e1')->nullable();
            $table->text('b4e1_remarks')->nullable();
            $table->integer('b4e2')->nullable();
            $table->text('b4e2_remarks')->nullable();
            $table->integer('b4e3')->nullable();
            $table->text('b4e3_remarks')->nullable();
            $table->integer('b4f')->nullable();
            $table->text('b4f_remarks')->nullable();
            $table->integer('b5a1')->nullable();
            $table->text('b5a1_remarks')->nullable();
            $table->integer('b5a2')->nullable();
            $table->text('b5a2_remarks')->nullable();
            $table->integer('b5b11')->nullable();
            $table->text('b5b11_remarks')->nullable();
            $table->integer('b5b12')->nullable();
            $table->text('b5b12_remarks')->nullable();
            $table->integer('b5b21')->nullable();
            $table->text('b5b21_remarks')->nullable();
            $table->integer('b5b22')->nullable();
            $table->text('b5b22_remarks')->nullable();
            $table->integer('b5c1')->nullable();
            $table->text('b5c1_remarks')->nullable();
            $table->integer('b5c2')->nullable();
            $table->text('b5c2_remarks')->nullable();
            $table->integer('b5d')->nullable();
            $table->text('b5d_remarks')->nullable();
            $table->integer('b5e')->nullable();
            $table->text('b5e_remarks')->nullable();
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
        Schema::dropIfExists('rst_b_externals');
    }
};
