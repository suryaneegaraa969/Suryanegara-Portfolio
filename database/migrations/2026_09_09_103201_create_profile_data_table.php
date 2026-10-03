<?php
// database/migrations/xxxx_xx_xx_create_profile_data_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profile_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->text('short_bio');
            $table->string('resume_url')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('background_image')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_data');
    }
};