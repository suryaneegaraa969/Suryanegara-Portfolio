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
        Schema::table('skill_items', function (Blueprint $table) {
            $table->dropColumn('level');
            $table->string('level')->default('beginner')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skill_items', function (Blueprint $table) {
            $table->dropColumn('level');
            $table->unsignedTinyInteger('level')->default(0)->after('name');
        });
    }
};
