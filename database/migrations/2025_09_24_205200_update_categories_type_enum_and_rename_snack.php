<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Safely change enum by widening to VARCHAR first
        DB::statement("ALTER TABLE categories MODIFY COLUMN type VARCHAR(50) NOT NULL");

        // Update existing data: rename 'Snack' to 'Cake' and set type to 'pancakes'
        DB::table('categories')
            ->where('name', 'Snack')
            ->update([
                'name' => 'Cake',
                'type' => 'pancakes',
            ]);

        // Normalize any unexpected values to a safe default before narrowing to ENUM
        DB::table('categories')
            ->whereNotIn('type', ['makanan', 'minuman', 'Cake', 'pancakes'])
            ->orWhereNull('type')
            ->update(['type' => 'makanan']);

        // Narrow back to ENUM with the new allowed value
        DB::statement("ALTER TABLE categories MODIFY COLUMN type ENUM('makanan','minuman','Cake','pancakes') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Move any 'pancakes' values to an existing type before shrinking
        DB::table('categories')
            ->where('type', 'pancakes')
            ->update(['type' => 'makanan']);

        // Widen to VARCHAR to avoid enum truncation when shrinking
        DB::statement("ALTER TABLE categories MODIFY COLUMN type VARCHAR(50) NOT NULL");

        // Shrink the enum back to the previous set
        DB::statement("ALTER TABLE categories MODIFY COLUMN type ENUM('makanan','minuman','Cake') NOT NULL");

        // Revert the name if it was set to 'Cake' previously
        DB::table('categories')
            ->where('name', 'Cake')
            ->update(['name' => 'Snack']);
    }
};

