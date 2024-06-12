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
        Schema::create('bro_de_pillars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploder_id')->nullable();
            $table->string('secretariat_office')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->string('region')->nullable();
            $table->integer('d1')->nullable();
            $table->text('d1_remarks')->nullable();
            $table->integer('e')->nullable();
            $table->text('e_remarks')->nullable();
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
        Schema::dropIfExists('bro_de_pillars');
    }
};
