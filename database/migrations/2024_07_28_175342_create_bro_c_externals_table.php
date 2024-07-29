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
        Schema::create('bro_c_externals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('validator_id')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->integer('c1')->nullable();
            $table->text('c1_remarks')->nullable();
            $table->integer('c2')->nullable();
            $table->text('c2_remarks')->nullable();
            $table->integer('c31')->nullable();
            $table->text('c31_remarks')->nullable();
            $table->integer('c32')->nullable();
            $table->text('c32_remarks')->nullable();
            $table->integer('c33')->nullable();
            $table->text('c33_remarks')->nullable();
            $table->integer('c411')->nullable();
            $table->text('c411_remarks')->nullable();
            $table->integer('c412')->nullable();
            $table->text('c412_remarks')->nullable();
            $table->integer('c421')->nullable();
            $table->text('c421_remarks')->nullable();
            $table->integer('c422')->nullable();
            $table->text('c422_remarks')->nullable();
            $table->integer('c431')->nullable();
            $table->text('c431_remarks')->nullable();
            $table->integer('c432')->nullable();
            $table->text('c432_remarks')->nullable();
            $table->integer('c5')->nullable();
            $table->text('c5_remarks')->nullable();
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
        Schema::dropIfExists('bro_c_externals');
    }
};
