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
        Schema::create('bro_a_pillars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploder_id')->nullable();
            $table->string('secretariat_office')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->string('region')->nullable();
            $table->integer('a1')->nullable();
            $table->longText('a1_remarks')->nullable();
            $table->integer('a2')->nullable();
            $table->longText('a2_remarks')->nullable();
            $table->integer('a3')->nullable();
            $table->longText('a3_remarks')->nullable();
            $table->integer('a4')->nullable();
            $table->longText('a4_remarks')->nullable();
            $table->integer('a5a')->nullable();
            $table->longText('a5a_remarks')->nullable();
            $table->integer('a5b')->nullable();
            $table->longText('a5b_remarks')->nullable();
            $table->integer('a6')->nullable();
            $table->longText('a6_remarks')->nullable();
            $table->integer('a7a')->nullable();
            $table->longText('a7a_remarks')->nullable();
            $table->integer('a7b')->nullable();
            $table->longText('a7b_remarks')->nullable();
            $table->integer('a8')->nullable();
            $table->longText('a8_remarks')->nullable();
            $table->decimal('progress_percentage', 5, 2)->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bro_a_pillars');
    }
};
