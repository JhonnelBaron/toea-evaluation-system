<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('executive_office_accounts', function (Blueprint $table) {
            $tableName = 'executive_office_accounts';
            $columnName = 'executive_office';
            $newEnumOptions = ['AS', 'LD', 'CO', 'FMS', 'NITESD', 'PIAD', 'PO', 'PLO', 'ROMO', 'ROMD', 'RO', 'ICTO', 'WS', 'EV'];

            // Generate the raw SQL query to modify the ENUM
            $newEnumSql = implode("','", $newEnumOptions);
            $sql = "ALTER TABLE `$tableName` MODIFY COLUMN `$columnName` ENUM('$newEnumSql')";

            // Execute the raw SQL query
            DB::statement($sql);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('executive_office_accounts', function (Blueprint $table) {
            $tableName = 'executive_office_accounts';
            $columnName = 'executive_office';
            $originalEnumOptions = ['AS', 'LD', 'CO', 'FMS', 'NITESD', 'PIAD', 'PO', 'PLO', 'ROMO', 'ROMD', 'RO', 'ICTO', 'WS'];

            // Generate the raw SQL query to revert the ENUM
            $originalEnumSql = implode("','", $originalEnumOptions);
            $sql = "ALTER TABLE `$tableName` MODIFY COLUMN `$columnName` ENUM('$originalEnumSql')";

            // Execute the raw SQL query
            DB::statement($sql);
        });
    }
};
