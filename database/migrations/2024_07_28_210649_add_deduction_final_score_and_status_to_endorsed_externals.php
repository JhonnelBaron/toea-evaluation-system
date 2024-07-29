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
        Schema::table('endorsed_externals', function (Blueprint $table) {
            $table->integer('deduction')->nullable()->after('romo_final_score');
            $table->integer('final_score')->nullable()->after('deduction');
            $table->text('submission_status')->nullable()->after('final_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('endorsed_externals', function (Blueprint $table) {
            $table->dropColumn(['deduction', 'final_score', 'submission_status']);
        });
    }
};
