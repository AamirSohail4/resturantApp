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
        Schema::table('products', function (Blueprint $table) {
            // index frequently queried/ordered columns to speed up retrieval
            if (!Schema::hasColumn('products', 'created_at')) {
                return;
            }

            $table->index('created_at');
            $table->index('is_active');
            // category_id already indexed by foreignId->constrained, but ensure again
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
            $table->dropIndex(['is_active']);
            $table->dropIndex(['category_id']);
        });
    }
};
