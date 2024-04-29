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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title');
            $table->string('body');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('author');

            $table->foreign('author')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('body');
            $table->dropColumn('image');
            $table->dropForeign('posts_author_foreign');
        });
    }
};
