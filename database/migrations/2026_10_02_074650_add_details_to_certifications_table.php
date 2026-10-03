<?php
// database/migrations/xxxx_xx_xx_add_details_to_certifications_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('certifications', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
            $table->longText('full_description')->nullable()->after('description');
            $table->string('skills_covered')->nullable()->after('full_description');
            $table->string('duration')->nullable()->after('skills_covered');
            $table->string('credential_url')->nullable()->after('duration');
        });
    }

    public function down(): void
    {
        Schema::table('certifications', function (Blueprint $table) {
            $table->dropColumn(['slug', 'full_description', 'skills_covered', 'duration', 'credential_url']);
        });
    }
};