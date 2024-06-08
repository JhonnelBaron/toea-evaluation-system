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
        Schema::create('executive_office_accounts', function (Blueprint $table) {
            $table->id();
            $table->enum('executive_office', ['AS', 'LD', 'CO', 'FMS', 'NITESD', 'PIAD', 'PO', 'PLO', 'ROMO','ROMD', 'RO'])->nullable();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('office')->nullable();
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('executive_office_accounts');
    }
};
