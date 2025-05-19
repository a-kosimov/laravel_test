<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('intervals', function (Blueprint $table) {
            $table->index('start', 'intervals_start_index');
            $table->index('end', 'intervals_end_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('intervals', function (Blueprint $table) {
            $table->dropIndex('intervals_start_index');
            $table->dropIndex('intervals_end_index');
        });
    }
}
