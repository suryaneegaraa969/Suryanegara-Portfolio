<?php
// database/migrations/xxxx_xx_xx_add_details_to_portfolio_projects_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('portfolio_projects', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
            $table->string('role')->nullable()->after('description');
            $table->string('duration')->nullable()->after('role');
            $table->string('project_type')->nullable()->after('duration');
            $table->string('tools_used')->nullable()->after('project_type');
            $table->longText('full_description')->nullable()->after('tools_used');
        });
    }

    public function down(): void
    {
        Schema::table('portfolio_projects', function (Blueprint $table) {
            $table->dropColumn(['slug', 'role', 'duration', 'project_type', 'tools_used', 'full_description']);
        });
    }
};