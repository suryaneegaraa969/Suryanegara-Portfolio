<?php
// database/seeders/SkillItemSeeder.php
namespace Database\Seeders;

use App\Models\SkillItem;
use Illuminate\Database\Seeder;

class SkillItemSeeder extends Seeder
{
    public function run(): void
    {
        SkillItem::insert([
            ['name' => 'Python (Data Analysis)', 'level' => 85, 'category' => 'Hard Skill', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tableau', 'level' => 85, 'category' => 'Hard Skill', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Java', 'level' => 70, 'category' => 'Hard Skill', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'HTML, CSS & JavaScript', 'level' => 80, 'category' => 'Hard Skill', 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laravel & Tailwind CSS', 'level' => 75, 'category' => 'Hard Skill', 'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Figma (UI/UX Design)', 'level' => 78, 'category' => 'Hard Skill', 'sort_order' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MySQL', 'level' => 75, 'category' => 'Hard Skill', 'sort_order' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Data Mining & Machine Learning', 'level' => 70, 'category' => 'Hard Skill', 'sort_order' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Communication', 'level' => 85, 'category' => 'Soft Skill', 'sort_order' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Time Management', 'level' => 82, 'category' => 'Soft Skill', 'sort_order' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Teamwork', 'level' => 88, 'category' => 'Soft Skill', 'sort_order' => 11, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Critical Thinking', 'level' => 80, 'category' => 'Soft Skill', 'sort_order' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Adaptability', 'level' => 85, 'category' => 'Soft Skill', 'sort_order' => 13, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}