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
        Schema::table('stories', function (Blueprint $table) {
            $table->decimal('rating_score', 3, 2)->default(0.00);
            $table->unsignedBigInteger('rating_count')->default(0);
            $table->unsignedInteger('chapter_count')->default(0);
            $table->unsignedInteger('comment_count')->default(0);
            $table->unsignedInteger('review_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->dropColumn(['rating_score', 'rating_count', 'chapter_count', 'comment_count', 'review_count']);
        });
    }
};
