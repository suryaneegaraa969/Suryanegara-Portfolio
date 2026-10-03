<?php
// database/migrations/xxxx_xx_xx_create_skill_items_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('skill_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('level'); // 0-100
            $table->string('category')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skill_items');
    }
};